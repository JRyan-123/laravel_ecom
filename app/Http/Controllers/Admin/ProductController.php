<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function manage_product()
    {
        $products = Product::with('vendor','category', 'subcategory')->orderBy('id','desc')->paginate(10);
        return view('admin.product.manage_product', compact('products'));
    }
    // End method


    public function manage_product_review()
    {
        $reviews = Review::with('product','customer')->orderBy('id','desc')->paginate(10);
        return view('admin.product.manage_product_review', compact('reviews'));
    }
    // End method


    public function product_delete($id)
    {
        Product::findOrFail($id)->delete();

        return back()->with('success', 'Prdouct Successfully deleted');
    }
    // end method


    public function review_delete($id)
    {
        Review::findOrFail($id)->delete();

        return back()->with('success', 'Review Successfully deleted');
    }
    // end metghid
}
