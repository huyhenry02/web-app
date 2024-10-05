<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/campaigns.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Campaign::create([
                'name' => $item->name,
                'code' => $item->code,
                'description' => $item->description,
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'status' => $item->status,
                'follower_required' => $item->follower_required,
                'blacklist_excluded' => $item->blacklist_excluded,
                'created_by_id' => $item->created_by_id,
                'updated_by_id' => $item->updated_by_id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }
    }
}
