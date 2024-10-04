<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApprovalHistory;

class ApprovalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/approval_histories.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            ApprovalHistory::create([
                'campaign_id' => $item->campaign_id,
                'creator_id' => $item->creator_id,
                'admin_id' => $item->admin_id,
                'action' => $item->action,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }
    }
}
