<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('category_name')->get();
        $subcategories = Subcategory::orderBy('subcategory_name')->get();
        if (isset($_GET['btnsearch'])) {
            $products = Product::orderBy('product_name')
                ->where('product_name', 'like', '%'.$_GET["searchbar"].'%')
                ->get();
        }
        else if (isset($_GET['subcategory'])) {
            $products = Product::orderBy('product_name')
                ->select('products.*')
                ->join('product_has_subcategory', 'product_has_subcategory.Product_id', '=', 'products.id')
                ->join('subcategories', 'subcategories.id', '=', 'product_has_subcategory.Subcategory_id')
                ->where('subcategory_name',  $_GET["subcategory"])
                ->get();
        }
        else if (isset($_GET['category'])) {
            $products = Product::orderBy('product_name')
                ->select('products.*')
                ->join('product_has_subcategory', 'product_has_subcategory.Product_id', '=', 'products.id')
                ->join('subcategories', 'subcategories.id', '=', 'product_has_subcategory.Subcategory_id')
                ->join('categories', 'categories.id', '=', 'subcategories.Category_id')
                ->where('category_name',  $_GET["category"])
                ->get();
        }
        else {
            $products = Product::orderBy('product_name')->get();
        }

        return view('producten', compact('categories', 'subcategories', 'products'));
    }
}