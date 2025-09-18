<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
     public function create_subcat()
    {   
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }
    // End method


    public function manage_subcat()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.manage', compact('subcategories'));
    }
    // End method
}
