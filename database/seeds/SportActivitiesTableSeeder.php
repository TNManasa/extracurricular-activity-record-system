<?php

use Illuminate\Database\Seeder;

class SportActivitiesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sport_activities')->delete();

        DB::table('sport_activities')->insert([
            's_id' => 4,
            'sport_id' => 1,
            'role' => 'Captain',
        ]);

        DB::table('sport_activities')->insert([
            's_id' => 5,
            'sport_id' => 2,
            'role' => 'Vice Captain',
        ]);

        DB::table('sport_activities')->insert([
            's_id' => 6,
            'sport_id' => 3,
            'role' => 'Team Member',
        ]);
    }

}
