<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acknowledge Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .modal {
            display: block;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 500px;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .modal-footer button {
            padding: 10px 20px;
        }
        #acknowledgeButton {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #acknowledgeButton:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        #goBackButton {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .acknowledge-text {
            padding: 10px 0;
        }
        .acknowledge-text.disabled {
            color: #cccccc;
        }
    </style>
</head>
<body>
<div id="acknowledgeModal" class="modal">
    <div class="modal-content">
        <div>
            <input type="checkbox" id="acknowledgeCheckbox1">
            <label for="acknowledgeCheckbox1" class="acknowledge-text">
                I hereby acknowledge that I have read and agree to the <a href="{{route('privacy')}}" target="_blank">Privacy Policy</a>.
            </label>
        </div>
        <div class="modal-footer">
            <button id="acknowledgeButton" disabled>Continue</button>
            <button id="goBackButton">Go Back</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('acknowledgeCheckbox1').addEventListener('change', function() {
        const isChecked = this.checked;
        document.getElementById('acknowledgeButton').disabled = !isChecked;
    });

    document.getElementById('acknowledgeButton').addEventListener('click', function() {
        if (!this.disabled) {
            window.location.href = '/community';
        }
    });

    document.getElementById('goBackButton').addEventListener('click', function() {
        window.history.back();
    });
</script>
</body>
</html>
