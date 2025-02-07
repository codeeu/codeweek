<?php
// Database connection
$host = getenv('DB_HOST');
$database = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$port = getenv('DB_PORT');

$mysqli = new mysqli($host, $username, $password, $database, $port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected to $database at $host:$port with user $username\n";

$batchSize = 1000; // running 1000 as db is being locked
$sleepTime = 1; // seconds for the sleep between batches
$maxBatches = 545; // Max batches to prevent infinite loop, we have 540020 records
$batches = 0;
$logFile = 'delete_log.txt';

// Function to log messages to a file
function logMessage($message) {
    global $logFile;
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

try {
    // Start by creating a temporary table for the deletable event IDs
    $query = "
        CREATE TEMPORARY TABLE deletable_ids AS
        SELECT e.id
        FROM events e
        JOIN (
            SELECT title, slug, organizer, geoposition
            FROM events
            WHERE created_at >= '2025-01-28'
            AND country_iso = 'DE'
            GROUP BY title, slug, organizer, geoposition
            HAVING COUNT(*) > 1
        ) dupes ON e.title = dupes.title
        AND e.slug = dupes.slug
        AND e.organizer = dupes.organizer
        AND e.geoposition = dupes.geoposition
        WHERE e.created_at >= '2025-01-28'
        AND e.country_iso = 'DE';
    ";
    $result = $mysqli->query($query);

    if (!$result) {
        throw new Exception($mysqli->error);
    }

    logMessage("Temporary table created successfully");
    echo "Temporary table created successfully\n";

    while ($batches < $maxBatches) {
        // Select IDs to delete in batches from the temporary table
        $selectQuery = "
            SELECT id
            FROM deletable_ids
            LIMIT $batchSize;
        ";
        $result = $mysqli->query($selectQuery);

        if (!$result) {
            throw new Exception($mysqli->error);
        }

        $ids = array();
        while ($row = $result->fetch_assoc()) {
            $ids[] = $row['id'];
        }

        if (empty($ids)) {
            logMessage("No more rows to delete");
            echo "No more rows to delete\n";
            break;
        }

        // Delete events in batches using the selected IDs
        $deleteQuery = "
            DELETE FROM events
            WHERE id IN (" . implode(',', $ids) . ");
        ";
        $result = $mysqli->query($deleteQuery);

        if (!$result) {
            throw new Exception($mysqli->error);
        }

        // Delete the IDs from the temporary table
        $deleteTempQuery = "
            DELETE FROM deletable_ids
            WHERE id IN (" . implode(',', $ids) . ");
        ";
        $result = $mysqli->query($deleteTempQuery);

        if (!$result) {
            throw new Exception($mysqli->error);
        }

        $affectedRows = $mysqli->affected_rows;
        if ($affectedRows > 0) {
            $batches++;
            logMessage("Batch $batches deleted $affectedRows rows successfully");
            echo "Batch $batches deleted $affectedRows rows successfully\n";
        } else {
            logMessage("No rows deleted in batch $batches");
            echo "No rows deleted in batch $batches\n";
        }

        // Sleep between batches to avoid overload
        sleep($sleepTime);
    }

    // Clean up by dropping the temporary table
    $query = "DROP TABLE deletable_ids";
    $result = $mysqli->query($query);

    if (!$result) {
        throw new Exception($mysqli->error);
    }

    logMessage("Temporary table dropped successfully");
    echo "Temporary table dropped successfully\n";
} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage());
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    // Close connection
    $mysqli->close();
}