<?php

namespace App\Services\Matchmaking;

use App\MatchmakingProfile;
use Illuminate\Support\Str;

class ProfileAvatarResolver
{
    private const ORG_DIR = 'images/matchmaking-tool/matchmaking-logos';
    private const VOLUNTEER_DIR = 'images/matchmaking-tool/matchmaking-volunteers';

    private const ALLOWED_EXTENSIONS = ['png', 'jpg', 'jpeg', 'webp', 'svg'];

    /**
     * @var array<string, string>|null
     */
    private ?array $organisationIndex = null;

    /**
     * @var array<string, string>|null
     */
    private ?array $volunteerIndex = null;

    public function resolveForProfile(MatchmakingProfile $profile): ?string
    {
        return $this->resolve(
            $profile->type,
            $profile->organisation_name,
            $profile->first_name,
            $profile->last_name,
            $profile->slug
        );
    }

    public function resolve(
        ?string $type,
        ?string $organisationName,
        ?string $firstName,
        ?string $lastName,
        ?string $slug = null
    ): ?string {
        $isOrganisation = $type === MatchmakingProfile::TYPE_ORGANISATION;
        $index = $isOrganisation ? $this->getOrganisationIndex() : $this->getVolunteerIndex();

        if (empty($index)) {
            return null;
        }

        $candidates = [];
        if (!empty($slug)) {
            $candidates[] = $slug;
        }
        if (!empty($organisationName)) {
            $candidates[] = $organisationName;
        }

        $fullName = trim(implode(' ', array_filter([(string) $firstName, (string) $lastName])));
        if ($fullName !== '') {
            $candidates[] = $fullName;
        }

        foreach ($candidates as $candidate) {
            $normalized = $this->normalize($candidate);
            if (isset($index[$normalized])) {
                return '/' . ltrim($index[$normalized], '/');
            }
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    public function getOrganisationIndex(): array
    {
        if ($this->organisationIndex === null) {
            $this->organisationIndex = $this->buildIndex(self::ORG_DIR);
        }

        return $this->organisationIndex;
    }

    /**
     * @return array<string, string>
     */
    public function getVolunteerIndex(): array
    {
        if ($this->volunteerIndex === null) {
            $this->volunteerIndex = $this->buildIndex(self::VOLUNTEER_DIR);
        }

        return $this->volunteerIndex;
    }

    /**
     * @return array<string, string>
     */
    private function buildIndex(string $relativeDirectory): array
    {
        $absoluteDirectory = public_path($relativeDirectory);
        if (!is_dir($absoluteDirectory)) {
            return [];
        }

        $index = [];
        $files = scandir($absoluteDirectory) ?: [];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (!in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
                continue;
            }

            $basename = pathinfo($file, PATHINFO_FILENAME);
            $normalized = $this->normalize($basename);
            if ($normalized === '') {
                continue;
            }

            $index[$normalized] = trim($relativeDirectory . '/' . $file, '/');
        }

        return $index;
    }

    private function normalize(string $value): string
    {
        return Str::slug(trim($value));
    }
}

