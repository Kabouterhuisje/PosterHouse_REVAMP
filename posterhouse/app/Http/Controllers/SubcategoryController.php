<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use Illuminate\Support\Facades\Redirect;
use Auth;

class SubcategoryController extends Controller
{
    private function validateUser()
    {
        if(!Auth::check() || !Auth::user()->role == "admin")
        {
            return false;
        }
    }

    // Creates a new subcategory
    public function newSubcategory(Request $request)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        if(isset($_POST['subcategory_name']) && isset($_POST['subcategory_from']))
        {
            Subcategory::Insert(['subcategory_name' => $_POST['subcategory_name'], 'Category_id' => $_POST['subcategory_from']]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/subcategories');

    }

    // Edits a subcategory
    public function editSubcategory(Request $request)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        if(isset($_POST['subcategory_name']) && isset($_POST['subcategory_from']))
        {
            Subcategory::Where('id', '=', $_POST['id'])->update(['subcategory_name' => $_POST['subcategory_name'], 'Category_id' => $_POST['subcategory_from'] ]);
        }
        else
        {
            return Redirect::to('422');
        }

        return Redirect::to('cms/subcategories');
    }

    public function removeSubcategory($id)
    {
        if($this->validateUser() === false)
        {
            return Redirect::to('403');
        }

        Subcategory::Where('id', '=', $id)->Delete();

        return redirect('cms/subcategories');
    }
}
