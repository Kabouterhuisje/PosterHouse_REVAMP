<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use Illuminate\Support\Facades\Redirect;

class SubcategoryController extends Controller
{
    // Creates a new subcategory
    public function newSubcategory(Request $request)
    {
        Subcategory::Insert(['subcategory_name' => $_POST['subcategory_name'], 'Category_id' => $_POST['subcategory_from']]);

        return Redirect::to('cms/subcategories');

    }

    // Edits a subcategory
    public function editSubcategory(Request $request)
    {
        Subcategory::Where('id', '=', $_POST['id'])->update(['subcategory_name' => $_POST['subcategory_name'], 'Category_id' => $_POST['subcategory_from'] ]);

        return Redirect::to('cms/subcategories');
    }

    public function removeSubcategory($id)
    {
        Subcategory::Where('id', '=', $id)->Delete();

        return redirect('cms/subcategories');
    }
}
