<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'name' => 'Jan',
                'email' => 'jan@gmail.com',
                'role' => '',
                'password' => Hash::make('password'),
            ),
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('admin'),
            )
        );

        DB::table('users')->insert($users);
    }
}
