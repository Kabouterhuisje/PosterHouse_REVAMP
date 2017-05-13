<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $products = array(
            array(
                'product_name' => 'Dora poster',
                'price' => 12.99,
                'description' => 'De jeugd is back!',
                'image' => 'dora.png',
            ),
            array(
                'product_name' => 'Muis poster',
                'price' => 12.99,
                'description' => 'Kei mooi',
                'image' => 'muis.png'
            )
        );

        DB::table('products')->insert($products);
    }
}
