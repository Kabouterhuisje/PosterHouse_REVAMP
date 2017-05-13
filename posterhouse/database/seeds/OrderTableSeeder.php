<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        $orders = array(
            array(
                'total_price' => 12.99,
                'date_created' => "2017-05-13 13:30:00",
                'User_id' => 1,
            ),
            array(
                'total_price' => 19.99,
                'date_created' => "2017-05-13 13:30:00",
                'User_id' => 2
            )
        );

        DB::table('orders')->insert($orders);
    }
}
