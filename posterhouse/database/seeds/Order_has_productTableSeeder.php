<?php

use Illuminate\Database\Seeder;

class Order_has_productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_has_products')->delete();

        $order_has_product = array(
            array(
                'Order_id' => 1,
                'User_id' => 1,
                'quantity' => 1,
                'Product_id' => 1,
            ),
            array(
                'Order_id' => 2,
                'User_id' => 2,
                'quantity' => 2,
                'Product_id' => 2
            )
        );

        DB::table('order_has_products')->insert($order_has_product);
    }
}
