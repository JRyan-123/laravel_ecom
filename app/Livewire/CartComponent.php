<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Cart;

class CartComponent extends Component
{


    public $items;
    public $subtotal;
    public $discount;
    public $tax;
    public $total;
    public $shippingCost = 45;




    public function mount() 
    {    
        $this->updatedShippingCost();
    }

    public function updatedShippingCost()
    {  
        session(['selected_shipping' => $this->shippingCost]);
       $this->calculateTotals();
       $this->loadItems();
    }


    public function clearCart()
    {
        Cart::where('user_id', auth()->id())->delete();

         $this->updatedShippingCost();
         $this->dispatch('updatedSpan');
          $this->dispatch('toast.success', message: 'Clear cart');
    }


    public function updateQuantity($id, $quantity)
    {
        Cart::where('id', $id)->update(['quantity' => $quantity]);    
         $this->updatedShippingCost();
    }


    public function removeItem($id)
    {   
        Cart::where('id', $id)->delete();
        
         $this->updatedShippingCost();
        $this->dispatch('updatedSpan');
    }
    
    public function loadItems()
    { 
         $this->items = auth()->user()
            ->carts()
            ->with('product.productImages')
            ->get();
    }

    // Calculate total, tax, subtotal, discount
    public function calculateTotals()
    {
        $carts = auth()->user()->carts()->with('product')->get();

        $this->subtotal = $carts->sum(function ($cart) {
            $price = $cart->product->discounted_price ?? $cart->product->regular_price;
            return $price * $cart->quantity;
        });

        $this->discount = $carts->sum(function ($cart) {
            if ($cart->product->discounted_price) {
                return ($cart->product->regular_price - $cart->product->discounted_price) * $cart->quantity;
            }
        });


        $this->tax = $this->subtotal * .12;

        $this->total = $this->subtotal + $this->tax + $this->shippingCost;
    }

    public function render()
    {   
        
        return view('livewire.cart-component', ['items' => $this->items]);
    }
}
