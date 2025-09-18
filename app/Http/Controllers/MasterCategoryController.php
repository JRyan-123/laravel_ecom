<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MasterCategoryController extends Controller
{
    public function cat_store(Request $request)
    {
        $validate_cat = $request->validate([
            'category_name' => 'required|max:50|unique:categories',
        ]);

        Category::create($validate_cat);

        return redirect()->route('admin.category.manage')->with('success','Successfully created');

    }
    // End method

    public function cat_show($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));

    }
    // End method

    public function cat_update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validate_cat = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        $category->update($validate_cat);

        return redirect()->route('admin.category.manage')->with('success','Successfully updated');
    }
    // End method


    public function cat_delete($id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Successfully deleted');
    }

}
