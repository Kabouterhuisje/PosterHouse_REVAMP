<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\Redirect;

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

    // Creates a new product
    public function newProduct(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);

        Product::Insert(['product_name' => $_POST['product_name'], 'image' => $imageName, 'description' => $_POST['description'],
            'price' => $_POST['price'] ]);

        return Redirect::to('cms/producten');

    }

    // Edits a product
    public function editProduct()
    {
        Product::Where('id', '=', $_POST['id'])->update(['product_name' => $_POST['product_name'],
            'image' => $_POST['image'], 'description' => $_POST['description'], 'price' => $_POST['price'] ]);

        return Redirect::to('cms/producten');
    }
}