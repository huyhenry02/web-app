<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Creator;
use Illuminate\Database\Seeder;

class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/creators.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Creator::create([
                'user_id' => $item->user_id,
                'social_media_link' => $item->social_media_link,
                'address' => $item->address,
                'follower_count' => $item->follower_count,
                'platform' => $item->platform,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }
    }
}
