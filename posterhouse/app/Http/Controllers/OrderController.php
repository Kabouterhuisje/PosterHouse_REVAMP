<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_has_product;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private function validateUser()
    {
        if(!Auth::check() || !Auth::user()->role == "admin")
        {
            return false;
        }
    }

    public function orderOverview()
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        return view('orderoverview');
    }

    public function insertOrder(Request $request)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        $order = Order::insertGetId([
            'total_price' => $request['totalPrice'],
            'date_created' => Carbon::now('Europe/Amsterdam'),
            'User_id' => Auth::user()->id
        ]);

        foreach (session('shopping_cart') as $key => $obj) {
            Order_has_product::Insert([
                'Order_id' => $order,
                'User_id' => Auth::user()->id,
                'quantity' => $obj[2],
                'Product_id' => $obj[3]
            ]);
        }

        Session::forget('shopping_cart');

        return view('welcome');
    }

    public function removeOrder($id)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        Order::Where('id', '=', $id)->Delete();

        return redirect('cms/orders');
    }
}
