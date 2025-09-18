<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function main()
    {   
        $user = auth()->user();
        // average rating
        $average = Review::whereHas('product', function ($q) use ($user) {
            $q->where('vendor_id', $user->id);
        })
        ->avg('rating');
        
        $store = Store::where('vendor_id', $user->id)->first();
        return view('vendor.store.main', compact('store','average'));
    }
    // end methid


    public function dbstore_store(Request $request)
    {   

        $validate_store = $request->validate([
            'store_name' => 'required|unique:stores,store_name',
            'address' => 'required|string|max:100',
            'phone' => 'required|string',
            'store_description' => 'required|max:100',
        ]);

        Store::create(array_merge($validate_store, [
            'user_id' => Auth::id(),
        ]));
        
        return redirect()->route('vendor.store.main')->with('success', 'Store Created');
    }
    // end methid


    public function update_store(Request $request)
    {

        $user = auth()->user();
        $store = $user->store;
        $validate_store = $request->validate([
            'store_name' => 'required|unique:stores,store_name,'.$store->id,
            'address' => 'required|string|max:100',
            'phone' => 'required|string',
            'store_description' => 'required|max:100',
        ]);

        $user->store()->update($validate_store);

        return redirect()->route('vendor.store.main')->with('success', 'Store updated');
    }
    // end methid

    public function reviews()
    {   
        $user = auth()->user();

        $reviews = Review::with('customer','product.productImages')->whereHas('items', function ($q) use ($user) {
            $q->where('vendor_id', $user->id);
        })->paginate(6);
        return view('vendor.store.reviews', compact('reviews'));
    }
}
