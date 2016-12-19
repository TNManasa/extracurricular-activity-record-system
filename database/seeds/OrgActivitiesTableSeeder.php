<?php

use Illuminate\Database\Seeder;

class OrgActivitiesTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table('org_activities')->delete();

        for ($i = 0; $i < 3; $i++) {
            DB::table('org_activities')->insert([
                'o_id' => $i+1,
                'org_id' => $i+1,
                'project_name' => $faker->sentence(2),
                'role' => $faker->sentence(2)
            ]);
        }
    }
}
