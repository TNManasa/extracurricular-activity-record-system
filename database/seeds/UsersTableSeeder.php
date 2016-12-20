<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Crypt;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student_emails = ['harry', 'hermione', 'ron', 'ginny', 'draco'];
        DB::table('users')->delete();
        for($i=0; $i<5; $i++) {
            DB::table('users')->insert([
                'id' => $i+1,
                'email' => $student_emails[$i] . '@gmail.com',
                'password' => Crypt::encrypt('123456'),
                'role' => 'student'
            ]);
        }

        $supervisor_emails = ['albus', 'minerva', 'severus', 'remus', 'dolores'];
        for($i=0; $i<5; $i++){
            DB::table('users')->insert([
                'id' => $i+6,
                'email' => $supervisor_emails[$i] . '@yahoo.com',
                'password' => Crypt::encrypt('123456'),
                'role' => 'supervisors'
            ]);
        }

        $admin_email = 'admin@gmail.com';
        DB::table('users')->insert([
            'id' => 11,
            'email' => $admin_email,
            'password' => Crypt::encrypt("123456"),
            'role' => 'admin'
        ]);
    }
}
