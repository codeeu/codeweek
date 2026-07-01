<?php

namespace App\Services;

use App\Event;

final class BulkEventDuplicateFinder
{
    private const COORDINATE_EPSILON = 0.00005;

    /**
     * Find an existing event that should be updated instead of creating a new row.
     * Matches title, start date, country, organiser, and either address or coordinates.
     *
     * @param  array<string, mixed>  $attrs
     */
    public function find(array $attrs): ?Event
    {
        $query = Event::query()
            ->where('title', $attrs['title'])
            ->where('start_date', $attrs['start_date'])
            ->where('country_iso', $attrs['country_iso'])
            ->where('organizer', $attrs['organizer']);

        $location = trim((string) ($attrs['location'] ?? ''));
        $latitude = (float) ($attrs['latitude'] ?? 0);
        $longitude = (float) ($attrs['longitude'] ?? 0);
        $hasCoordinates = abs($latitude) > self::COORDINATE_EPSILON
            || abs($longitude) > self::COORDINATE_EPSILON;

        if ($location !== '') {
            $query->where('location', $location);
        } elseif ($hasCoordinates) {
            $query->whereBetween('latitude', [$latitude - self::COORDINATE_EPSILON, $latitude + self::COORDINATE_EPSILON])
                ->whereBetween('longitude', [$longitude - self::COORDINATE_EPSILON, $longitude + self::COORDINATE_EPSILON]);
        }

        return $query->first();
    }
}
