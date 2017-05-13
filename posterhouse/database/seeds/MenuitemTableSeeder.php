<?php

use Illuminate\Database\Seeder;

class MenuitemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menuitems')->delete();

        $menuitems = array(
            array(
                'menuitem_name' => 'Home',
                'menuitem_link' => 'welcome',
            ),
            array(
                'menuitem_name' => 'Producten',
                'menuitem_link' => 'producten',
            ),
            array(
                'menuitem_name' => 'Contact',
                'menuitem_link' => 'contact'
            )
        );

        DB::table('menuitems')->insert($menuitems);
    }
}
