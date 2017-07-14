<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('categories')->insert(
                        array(
                                array('name' => 'WHISKY'),
                                array('name' => 'VINO'),
                                array('name' => 'RON'),
                                array('name' => 'GINEBRA'),
                                array('name' => 'TEQUILA'),
                                array('name' => 'VODKA'),
                                array('name' => 'BAILEYS'),
                                array('name' => 'MALTAS'),
                                array('name' => 'BULLEIT'),
                        ));
    }
}
