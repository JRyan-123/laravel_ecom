<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{   
    public $id;

    protected $listeners = [
        'addedToCart' => 'addToCart',
         'addedToHeart' => 'addToHeart',
    ];

     public function addToHeart($id)
    {
        // redirect if not logged in
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }
        
        $product = Product::findOrFail($id);
        $wishlist = Wishlist::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->first();
        
        // check if not created yet
        if (!$wishlist) {
            Wishlist::create([
                'user_id'       => auth()->id(),
                'product_id'    => $product->id,
                'price'         => $product->discounted_price ?? $product->regular_price,
            ]);

            $this->dispatch('toast.success', message: $product->product_name.' added in wishlist');
        } else {
            $this->dispatch('toast.error', message: $product->product_name.' already in wishlist');
        }   
         
    
        $this->dispatch('updatedSpan');
    }

    public function addToCart($id)
    {   
        // redirect if not logged in
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }

        $user = auth()->user();

        $product = Product::findOrFail($id);
        $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $id)
                ->first();

        // check if not created yet
        if (!$cart) {
            Cart::create([
                'user_id'       => auth()->id(),
                'product_id'    => $product->id,
                'price'         => $product->discounted_price ?? $product->regular_price,
            ]);
            $this->dispatch('toast.success', message: $product->product_name.' added in cart');
        } else {
            $this->dispatch('toast.error', message: $product->product_name.' already in cart');
        }   

        

        $this->dispatch('updatedSpan');
    }
    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
