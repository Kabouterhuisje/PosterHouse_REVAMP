<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class ShoppingcartController extends Controller
{
    public function viewCart()
    {
        return view('winkelmandje');
    }

    public function addToCart(Request $request)
    {
        $product = collect([
            $request->get('hidden_name'),
            $request->get('hidden_price'),
            $request->get('quantity'),
            $request->get('hidden_id'),
        ]);

        session()->push('shopping_cart', $product);

        return Redirect::to('/winkelmandje');
    }

    public function flushItem($key)
    {
        Session::forget('shopping_cart.' . $key);

        return Redirect::to('/winkelmandje');
    }

    public function continuePurchase(Request $request)
    {
        if ($request->has('checkout')) {
            if (Auth::check()) {
                return Redirect::to('/orderoverview');
            }
            else {
                return Redirect::to('/login');
            }
        }
        else if ($request->has('verder')) {
            return Redirect::to('/producten');
        }
    }
}
