<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CategoryController extends Controller
{
    private function validateUser()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == "admin")
            {
                return true;
            }
        }
        return false;
    }

    public function create()
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.cms_categories');
        }
    }

    public function createNewCategory()
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            return view('cms.cms_new_category');
        }
    }

    function editView($categoryNummer)
    {
        //authenticatie
        if (!$this->validateUser())
        {
            return Redirect::to('403');
        }
        else
        {
            $data = ['id' => $categoryNummer];
            return view('cms.cms_edit_category', $data);
        }
    }

    // Creates a new category
    public function newCategory(Request $request)
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }

        if(isset($_POST['category_name']))
        {
            Category::Insert(['category_name' => $_POST['category_name'] ]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/categories');

    }

    // Edits a product
    public function editCategory(Request $request)
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }

        if(isset($_POST['id']) && isset($_POST['category_name']))
        {
            Category::Where('id', '=', $_POST['id'])->update(['category_name' => $_POST['category_name'] ]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/categories');
    }

    public function removeCategory($id)
    {
        if(!$this->validateUser())
        {
            return Redirect::to('403');
        }

        Category::Where('id', '=', $id)->Delete();

        return redirect('cms/categories');
    }
}
