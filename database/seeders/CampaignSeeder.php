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
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet neque non nisi euismod aliquam. Sed vulputate velit at leo sollicitudin, vel tincidunt nunc aliquam. Quisque sit amet tortor et arcu gravida sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus sed diam et nisi tincidunt auctor non a eros. Integer ut purus nec justo euismod vehicula. Proin lacinia dui non erat varius, ac ultrices lorem commodo. Nulla facilisi. ',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet neque non nisi euismod aliquam. Sed vulputate velit at leo sollicitudin, vel tincidunt nunc aliquam. Quisque sit amet tortor et arcu gravida sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus sed diam et nisi tincidunt auctor non a eros. Integer ut purus nec justo euismod vehicula. Proin lacinia dui non erat varius, ac ultrices lorem commodo. Nulla facilisi. ',
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'status' => 'active',
                'follower_required' => $item->follower_required,
                'blacklist_excluded' => $item->blacklist_excluded,
                'banner' => $item->banner,
                'created_by_id' => $item->created_by_id,
                'updated_by_id' => $item->updated_by_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
