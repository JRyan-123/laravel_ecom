<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class MasterSubcategoryController extends Controller
{
    public function subcat_store(Request $request)
    {
        $validate_cat = $request->validate([
            'subcategory_name' => 'required|max:50|unique:subcategories',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create($validate_cat);

        return redirect()->route('admin.subcategory.manage')->with('success','Successfully created');

    }
    // End method


    public function subcat_show($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));

    }
    // End method



    public function subcat_update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $validate_cat = $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',

        ]);

        $subcategory->update($validate_cat);

        return redirect()->route('admin.subcategory.manage')->with('success','Successfully updated');
    }
    // End method


    public function subcat_delete($id)
    {
        Subcategory::findOrFail($id)->delete();

        return redirect()->back()->with('error', 'Deleted');
    }
}
