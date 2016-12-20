<?php

use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('achievements')->delete();

        DB::table('achievements')->insert([
            'id' => 9,
            'achievement_name' => 'CSE 14 Batch Representative',
        ]);

        DB::table('achievements')->insert([
            'id' => 10,
            'achievement_name' => 'AIESEC CS Member of the Month',
        ]);

    }
}
