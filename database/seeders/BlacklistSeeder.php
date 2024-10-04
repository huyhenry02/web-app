<?php

namespace Database\Seeders;

use App\Models\Blacklist;
use Illuminate\Database\Seeder;

class BlacklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/blacklists.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Blacklist::create([
                'creator_id' => $item->creator_id,
                'reason' => $item->reason,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }
    }
}
