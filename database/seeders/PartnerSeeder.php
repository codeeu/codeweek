<?php

namespace Database\Seeders;

use App\Livewire\PartnerContentComponent;
use App\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Seed partners from the component's default list (current hardcoded partners).
     * Run once after migration to move partners into the DB so they can be edited in Nova.
     * Safe to run multiple times: only inserts when the table is empty.
     */
    public function run(): void
    {
        if (Partner::count() > 0) {
            $this->command->info('Partners table already has data. Skipping seed. Delete partners first to re-seed from defaults.');

            return;
        }

        $defaults = PartnerContentComponent::getDefaultPartnersForSeeding();

        foreach ($defaults as $i => $row) {
            Partner::create([
                'name' => $row['name'] ?? null,
                'logo_url' => $row['logo_url'] ?? '',
                'categories' => $row['categories'] ?? ['Partners'],
                'description' => $row['description'] ?? null,
                'link_url' => $row['link_url'] ?? null,
                'main_img_url' => $row['main_img_url'] ?? null,
                'position' => $i,
                'active' => true,
            ]);
        }

        $this->command->info('Seeded ' . count($defaults) . ' partners. You can now edit them in Nova.');
    }
}
