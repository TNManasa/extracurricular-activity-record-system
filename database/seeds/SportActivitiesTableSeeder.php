<?php

use Illuminate\Database\Seeder;

class SportActivitiesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sport_activities')->delete();

        DB::table('sport_activities')->insert([
            'id' => 3,
            'sport_id' => 1,
            'role' => 'Captain',
        ]);

        DB::table('sport_activities')->insert([
            'id' => 4,
            'sport_id' => 2,
            'role' => 'Vice Captain',
        ]);

        DB::table('sport_activities')->insert([
            'id' => 5,
            'sport_id' => 3,
            'role' => 'Team Member',
        ]);
    }

}
