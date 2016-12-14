<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        for($i=0; $i<5; $i++) {
            DB::table('users')->insert([
                'id' => $i+1,
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'student'
            ]);
        }

        for($i=0; $i<5; $i++){
            DB::table('users')->insert([
                'id' => $i+6,
                'email' => str_random(10). '@yahoo.com',
                'password' => bcrypt('123456'),
                'role' => 'supervisor'
            ]);
        }
    }
}
