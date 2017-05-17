<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function removeOrder($id)
    {
        Order::Where('id', '=', $id)->Delete();

        return redirect('cms/orders');
    }
}
