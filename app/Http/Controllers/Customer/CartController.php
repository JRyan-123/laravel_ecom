<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
class CartController extends Controller
{
    public function index()
    {   
        return view('customer.pre_orders.cart');
    }
    // end method

   

    public function payment()
    {   
        $carts = auth()->user()->carts()->with('product')->get();

        // limit the payment for no products
        if ($carts->isEmpty()) {
            return back()->with('error','no products to cart');
        }

        // display info
        $items = auth()->user()
            ->carts()
            ->with('product.productImages')
            ->get();

        $selectedShipping = session('selected_shipping', 45);
        
        $subtotal = $carts->sum(function ($cart) {
            $price = $cart->product->discounted_price ?? $cart->product->regular_price;
            return $price * $cart->quantity;
        });

        $tax = $subtotal * .12;

        $total = $subtotal + $tax + $selectedShipping;
    
        return view('customer.pre_orders.payment', compact('items', 'selectedShipping', 'subtotal', 'tax', 'total'));
    }
}
