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

        $types = [1,2,3,4,1,2,3,4,1];
        $student_ids = [1,2,3,4,5,1,2,3,4,5];

        DB::table('activities')->delete();
        for($i=0; $i<10; $i++){
            DB::table('activities')->insert([
                'id' => $i+1,
                'student_id' => $student_ids[$i],
                'activity_type' => $types[$i],
                'start_date' => $faker->date(),
                'end_date' => "Present",
                'description' => $faker->paragraph(2, true)
        ]);
        }
    }
}
