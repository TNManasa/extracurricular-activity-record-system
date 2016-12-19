<?php

use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('achievements')->delete();

        DB::table('achievements')->insert([
            'a_id' => 9,
            'achievement_name' => 'CSE 14 Batch Representative',
        ]);

        DB::table('achievements')->insert([
            'a_id' => 10,
            'achievement_name' => 'AIESEC CS Member of the Month',
        ]);

    }
}
