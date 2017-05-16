<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage()
    {
        Message::Insert(['form_name' => $_POST['name'], 'form_email' => $_POST['email'], 'form_title' => $_POST['subject'],
            'form_message' => $_POST['message'] ]);

        return Redirect::to('contact');
    }
}
