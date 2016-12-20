<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    public function run()
    {
        /*
            == Type ==
            1 = Organization
            2 = Sport
            3 = Competition
            4 = Achievement
         */

        $faker = Faker\Factory::create();

        $types = [1,1,1,2,2,2,3,3,4,4];
        $index_nos = ['140001A', '140002B', '140003C', '150002D', '140200E','140001A', '140002B', '140003C', '150002D', '140200E'];

        DB::table('activities')->delete();

        for($i=0; $i<10; $i++){
            DB::table('activities')->insert([
                'id' => $i+1,
                'student_id' => $index_nos[$i],
                'activity_type' => $types[$i],
                'start_date' => $faker->date(),
                'effort' => $faker->randomNumber(1),
                'end_date' => 1,
                'description' => $faker->paragraph(2),
                'image'=>0
        ]);
        }
    }
}
