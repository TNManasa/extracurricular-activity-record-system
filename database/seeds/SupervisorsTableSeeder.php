<?php

use Illuminate\Database\Seeder;

class SupervisorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('supervisors')->delete();

        $emp_ids = ['150A', '140B', '403C', '123E', '495X'];
        $first_names = ['Albus', 'Minerva', 'Severus', 'Remus', 'Dolores'];
        $last_names = ['Dumbledore', 'McGonnagall', 'Snape', 'Lupin', 'Umbridge'];
        $positions = ['Headmaster', 'Head-Transfigurations',  'Head-Potions', 'Head-DAGA', 'Head-Ministry Affairs'];


        for ($i = 0; $i < 5; $i++) {
            DB::table('supervisors')->insert([
                'emp_id' => $emp_ids[$i],
                'first_name' => $first_names[$i],
                'last_name' => $last_names[$i],
                'position' => $positions[$i],
                'user_id' => $i+6
            ]);
        }
    }
}
