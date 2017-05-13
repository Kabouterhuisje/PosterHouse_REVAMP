<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->delete();

        $categorys = array(
            array(
                'category_name' => 'Cartoon',
            ),
            array(
                'category_name' => 'Televisie'
            )
        );

        DB::table('categorys')->insert($categorys);
    }
}
