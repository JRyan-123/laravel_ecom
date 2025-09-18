<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Wishlist;


class SpanComponent extends Component
{
    public $cartSpan = 0;
    public $wishlistSpan = 0;

    protected $listeners = [
        'updatedSpan' => 'updateCartSpan',
    ];
 
    // initialize cart and wishlist count
    public function mount()
    {
        $this->updateCartSpan();
    }

    // count the item in cart and wishlist
    public function updateCartSpan()
    {
        $this->cartSpan = Cart::where('user_id' , auth()->id())->count('id');
        $this->wishlistSpan = Wishlist::where('user_id' , auth()->id())->count('id');
    }

    public function render()
    {
        return view('livewire.span-component');
    }
}
