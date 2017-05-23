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
                'image' => 'doraposter.png',
            ),
            array(
                'product_name' => 'Muis poster',
                'price' => 12.99,
                'description' => 'Kei mooi',
                'image' => 'muisposter.png'
            ),
            array(
                'product_name' => 'Citroen poster',
                'price' => 10.99,
                'description' => 'Creative technologies!',
                'image' => 'citroenPoster.png',
            ),
            array(
                'product_name' => 'Tomaat poster',
                'price' => 5.99,
                'description' => 'Een prachtexemplaar',
                'image' => 'tomaatPoster.png',
            ),
            array(
                'product_name' => 'Worstraket poster',
                'price' => 3.99,
                'description' => 'Ready for takeoff!',
                'image' => 'worstraketPoster.png',
            ),
            array(
                'product_name' => 'Battle of the billionaires',
                'price' => 6.99,
                'description' => 'Who is winning?',
                'image' => 'leaderPoster.png',
            ),
            array(
                'product_name' => 'Will Smith poster',
                'price' => 3.99,
                'description' => 'The real deal!',
                'image' => 'willsmithPoster.png',
            )
        );

        DB::table('products')->insert($products);
    }
}
