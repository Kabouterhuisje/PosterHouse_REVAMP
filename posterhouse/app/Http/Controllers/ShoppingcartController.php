<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

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
            $request->get('quantity')
        ]);

        session()->push('shopping_cart', $product);

        return Redirect::to('/winkelmandje');
    }

    public function flushItem($key)
    {
        session_unset($key);

        return Redirect::to('/winkelmandje');
    }

    public function continuePurchase(Request $request)
    {
        if ($request->has('checkout')) {
            return Redirect::to('/orderoverview');
        }
        else if ($request->has('verder')) {
            return Redirect::to('/producten');
        }
    }
}
