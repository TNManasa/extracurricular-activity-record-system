<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('organizations')->delete();
        $organizations = ['AIESEC', 'Rotaract', 'MoraSpirit', 'The Gavel Club', 'Media Unit'];

        $count = count($organizations);
        for($i=0; $i<$count; $i++){
            DB::table('organizations')->insert([
                'id' => $i+1,
                'name' => $organizations[$i]
            ]);
        }
    }
}
