<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // Creates a new category
    public function newCategory(Request $request)
    {
        Category::Insert(['category_name' => $_POST['category_name'] ]);

        return Redirect::to('cms/categories');

    }

    // Edits a product
    public function editCategory(Request $request)
    {
        Category::Where('id', '=', $_POST['id'])->update(['category_name' => $_POST['category_name'] ]);

        return Redirect::to('cms/categories');
    }

    public function removeCategory($id)
    {
        Category::Where('id', '=', $id)->Delete();

        return redirect('cms/categories');
    }
}
