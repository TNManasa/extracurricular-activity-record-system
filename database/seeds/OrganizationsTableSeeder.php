<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{

    public function run()
    {
        $organizations = ['AIESEC', 'Rotaract', 'MoraSpirit', 'The Gavel Club', 'Media Unit'];

        $count = count($organizations);
        for($i=1; $i<=$count; $i++){
            DB::table('organizations')->insert([
                'id' => $i,
                'name' => $organizations[$i-1]
            ]);
        }
    }
}
