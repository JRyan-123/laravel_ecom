<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
class CustomerController extends Controller
{
    // main page
    public function index()
    {
        $bestsellers = Product::where('stock_quantity', '!=', 0)
            ->with(['category', 'productImages'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->withSum('orderItems', 'quantity')
            ->orderBy('reviews_avg_rating', 'desc')
            ->get();

      

        $categories = Category::inRandomOrder()
            ->with([
                'products' => fn($q) => $q->inRandomOrder()->limit(1), // 1 random product per category
                'products.productImages', // load all images for that product
            ])
            ->withSum('products', 'stock_quantity')
            ->get();
        return view('customer.main',compact('categories', 'bestsellers'));
    }
    // end methid


    public function category()
    {
        return view('customer.category');
    }
    // end methid

    public function about()
    {
        return view('customer.about');
    }
    // end methid


    public function product_view($id)
    {   
        $product = Product::with('productImages', 'category','reviews.customer')->withAvg('reviews', 'rating')
        ->withCount('reviews')->findOrFail($id);

        return view('customer.product.product_view', compact('product'));
    }
    // end methid

    
    public function contact()
    {
        return view('customer.contact');
    }
    // end methid
}
