<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function create_product()
    {   
        $user = auth()->user();
        $store = Store::where('vendor_id', $user->id)->first();
        if(!$store) {
            return redirect()->route('vendor.store.main')->with('error', 'Create a store first');
        }
        return view('vendor.product.create');
    }
    // end methid

    public function store_product(Request $request)
    {
        $user = auth()->user();
        $store = Store::where('vendor_id', $user->id)->first();
        if(!$store) {
            return redirect()->route('vendor.store.main')->with('error', 'Create a store first');
        }
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'description'      => 'nullable|string',
            'sku'              => 'required|string|unique:products,sku',
            'category_id'      => 'required|exists:categories,id',
            'subcategory_id'   => 'nullable|exists:subcategories,id',
            'regular_price'    => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'stock_quantity'   => 'required|integer|min:0',
            'images.*'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create([
            'product_name'     => $request->product_name,
            'description'      => $request->description,
            'sku'              => $request->sku,
            'vendor_id'        => Auth::id(),
            'category_id'      => $request->category_id,
            'subcategory_id'   => $request->subcategory_id,
            'regular_price'    => $request->regular_price,
            'discounted_price' => $request->discounted_price,
            'tax_rate'         => ($request->regular_price ?? $request->discounted_price) * .12,
            'stock_quantity'   => $request->stock_quantity,
            'slug'             => $request->slug,
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            
        ]);

        // Handle images uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images','public');
                ProductImage::create([
                    'product_id'    =>  $product->id,
                    'image_path'      =>  $path,
                    'is_primary'    =>  false,
                ]);
            }
        }

        return redirect()->route('vendor.product.manage')->with('success','Successfully created');
    }
    // End mrtyhod


    public function manage_product()
    {   
        
        $user = auth()->user();
        $store = Store::where('vendor_id', $user->id)->first();
        if(!$store) {
            return redirect()->route('vendor.store.main')->with('error', 'Create a store first');
        }
        $products = Product::withAvg('reviews','rating')->withCount('reviews')->where('vendor_id', $user->id)->get();

        return view('vendor.product.manage', compact('products'));
    }
    // end methid


    public function show_product($id)
    {

        $products = Product::where('id', $id)->get();

        return view('vendor.product.edit', compact('products'));        
    }
    // end method


    public function update_product(Request $request, $id)
    {
        $validate = $request->validate([
            'product_name'     => 'required|string|max:255',
            'description'      => 'nullable|string',
            'regular_price'    => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'stock_quantity'   => 'required|integer|min:0',
        ]);

        $validate['tax_rate'] = ($validate['discounted_price'] ?? $validate['regular_price']) * 0.12;
        
        $product = Product::findOrFail($id);
        
        $product->update($validate);

        return redirect()->route('vendor.product.manage')->with('success','Successfully edited!');
    }
    // end method

    
}
