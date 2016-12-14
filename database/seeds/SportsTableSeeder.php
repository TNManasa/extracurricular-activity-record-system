<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportsTableSeeder extends Seeder
{
    public function run()
    {
        $sports = ['Cricket', 'Football', 'Volleyball', 'Basketball', 'Carom', 'Chess', 'Hockey', 'Badminton'];

        $count = count($sports);
        for($i=1; $i<=$count; $i++){
            DB::table('sports')->insert([
                'id' => $i,
                'name' => $sports[$i-1]
            ]);
        }
    }

}
