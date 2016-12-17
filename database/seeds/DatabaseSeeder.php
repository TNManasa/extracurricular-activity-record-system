<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SupervisorsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(SportActivitiesTableSeeder::class);
        $this->call(OrgActivitiesTableSeeder::class);
    }
}
