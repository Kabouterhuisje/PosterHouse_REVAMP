<?php

namespace App\Http\Controllers;

use App\Product_has_subcategory;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

class ProductController extends Controller
{
    private function validateUser()
    {
        if(!Auth::check() || !Auth::user()->role == "admin")
        {
            return false;
        }
    }

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
                ->paginate(8);
        }
        else if (isset($_GET['subcategory'])) {
            $products = Product::orderBy('product_name')
                ->select('products.*')
                ->join('product_has_subcategory', 'product_has_subcategory.Product_id', '=', 'products.id')
                ->join('subcategories', 'subcategories.id', '=', 'product_has_subcategory.Subcategory_id')
                ->where('subcategory_name',  $_GET["subcategory"])
                ->paginate(8);
        }
        else if (isset($_GET['category'])) {
            $products = Product::orderBy('product_name')
                ->select('products.*')
                ->join('product_has_subcategory', 'product_has_subcategory.Product_id', '=', 'products.id')
                ->join('subcategories', 'subcategories.id', '=', 'product_has_subcategory.Subcategory_id')
                ->join('categories', 'categories.id', '=', 'subcategories.Category_id')
                ->where('category_name',  $_GET["category"])
                ->paginate(8);
        }
        else {
            $products = Product::orderBy('product_name')->paginate(8);
        }

        return view('producten', compact('categories', 'subcategories', 'products'));
    }

    // Creates a new product
    public function newProduct(Request $request)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/posters'), $imageName);

        if(isset($_POST['product_name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['subcategory']))
        {
            $last_id = DB::table('products')->insertGetId(
                ['product_name' => $_POST['product_name'], 'image' => $imageName, 'description' => $_POST['description'], 'price' => $_POST['price']]
            );

            Product_has_subcategory::Insert(['Product_id' => $last_id, 'Subcategory_id' => $_POST['subcategory'] ]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/producten');

    }

    // Edits a product
    public function editProduct(Request $request)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);

        if(isset($_POST['product_name']) && isset($_POST['description']) && isset($_POST['price']))
        {
            Product::Where('id', '=', $_POST['id'])->update(['product_name' => $_POST['product_name'],
                'image' => $imageName, 'description' => $_POST['description'], 'price' => $_POST['price'] ]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/producten');
    }

    public function removeProduct($id)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        Product::Where('id', '=', $id)->Delete();

        return redirect('cms/producten');
    }
}