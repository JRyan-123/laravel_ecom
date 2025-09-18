<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function create_cat()
    {
        return view('admin.category.create');
    }
    // End method


    public function manage_cat()
    {
        $categories = Category::all();

        return view('admin.category.manage', compact('categories'));
    }
    // End method
}
