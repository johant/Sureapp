<?php

use Illuminate\Database\Seeder;

class ClientTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          DB::table('client_types')->insert(
                        array(
                                array('name' => 'V.I.P'),
                                array('name' => 'DOS'),
                                array('name' => 'TRES'),
                        ));
    }
}
