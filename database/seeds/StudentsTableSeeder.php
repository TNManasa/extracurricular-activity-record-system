<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->delete();
        $index_nos = ['140001A', '140002B', '140003C', '150002D', '140200E'];
        $first_names = ['Harry', 'Hermione', 'Ron', 'Ginny', 'Draco'];
        $last_names = ['Potter', 'Granger', 'Weasely', 'Weasely', 'Malfoy'];
        $genders = [1,2,1,2,1];
        $dobs = ['1994-1-1', '1994-1-2', '1994-2-1', '1995-3-1', '1994-5-3'];
        $batches = ['14', '14', '14', '15', '14'];

        for($i=0; $i<5; $i++){
            DB::table('students')->insert([
                'index_no' => $index_nos[$i],
                'first_name' => $first_names[$i],
                'last_name' => $last_names[$i],
                'gender' => $genders[$i],
                'dob' => $dobs[$i],
                'batch' => $batches[$i],
                'user_id' => $i+1,
            ]);
        }
    }
}
