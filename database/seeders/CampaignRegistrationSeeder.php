<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CampaignRegistration;

class CampaignRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/campaign_registrations.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            CampaignRegistration::create([
                'campaign_id' => $item->campaign_id,
                'creator_id' => $item->creator_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
