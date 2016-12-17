<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->delete();
        DB::table('admin')->insert([
            'first_name' => 'Lord',
            'last_name' => 'Voldemort',
            'user_id' => '11'
        ]);
    }
}
