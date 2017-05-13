<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('MessagesTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('MenuitemTableSeeder');
        $this->call('SubcategoryTableSeeder');
        $this->call('ProductTableSeeder');
        $this->call('OrderTableSeeder');
        $this->call('Product_has_subcategoryTableSeeder');
        $this->call('Order_has_productTableSeeder');
    }
}
