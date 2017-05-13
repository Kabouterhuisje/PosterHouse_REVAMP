<?php

use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategorys')->delete();

        $subcategorys = array(
            array(
                'subcategory_name' => 'Dora',
                'Category_id' => 1,
            ),
            array(
                'subcategory_name' => 'Bob de Bauer',
                'Category_id' => 2
            )
        );

        DB::table('subcategorys')->insert($subcategorys);
    }
}
