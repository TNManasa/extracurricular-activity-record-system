<?php

use Illuminate\Database\Seeder;

class CompetitionActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competition_activities')->delete();

        DB::table('competition_activities')->insert([
            'id' => 7,
            'competition_name' => 'Code Sprint 2.0',
            'status' => 'Winner',
        ]);

        DB::table('competition_activities')->insert([
            'id' => 8,
            'competition_name' => 'Speech Olympiad 2016',
            'status' => 'Participation',
        ]);

    }
}
