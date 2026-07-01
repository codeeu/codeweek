<?php

namespace App\Services\BulkUserChanges;

use App\Country;

final class BulkUserChangesCountryResolver
{
    public function resolveIso(?string $countryName): ?string
    {
        if ($countryName === null || trim($countryName) === '' || trim($countryName) === '#VALUE!') {
            return null;
        }

        $trimmedName = trim($countryName);
        $lowerName = mb_strtolower($trimmedName);

        if (strlen($trimmedName) === 2) {
            $iso = strtoupper($trimmedName);
            if (Country::query()->where('iso', $iso)->exists()) {
                return $iso;
            }
        }

        $country = Country::query()->where('name', $trimmedName)->first()
            ?? Country::query()->whereRaw('LOWER(TRIM(name)) = ?', [$lowerName])->first()
            ?? Country::query()->whereRaw('LOWER(TRIM(name)) LIKE ?', ['%'.$lowerName.'%'])->first();

        return $country?->iso;
    }
}
