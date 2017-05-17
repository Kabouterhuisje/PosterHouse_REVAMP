<?php

use Illuminate\Database\Seeder;

class Product_has_subcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_has_subcategories')->delete();

        $product_has_subcategory = array(
            array(
                'Product_id' => 1,
                'Subcategory_id' => 1,
            ),
            array(
                'Product_id' => 2,
                'Subcategory_id' => 2
            )
        );

        DB::table('product_has_subcategories')->insert($product_has_subcategory);
    }
}
