<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->delete();

        $messages = array(
            array(
                'form_name' => 'Jan',
                'form_email' => 'jan@gmail.com',
                'form_title' => 'Vragen',
                'form_message' => 'Ik heb hulp nodig, bel me op!',
            ),
            array(
                'form_name' => 'Henk',
                'form_email' => 'henk@gmail.com',
                'form_title' => 'Yoo',
                'form_message' => 'Hoe is het?'
            )
        );

        DB::table('messages')->insert($messages);
    }
}
