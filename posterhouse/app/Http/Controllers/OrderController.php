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
    public function orderOverview()
    {
        return view('orderoverview');
    }

    public function insertOrder(Request $request)
    {
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
        Order::Where('id', '=', $id)->Delete();

        return redirect('cms/orders');
    }
}
