<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistTab extends Component
{   
    // hold items
    public $wishItems;

    public function mount() 
    {
        $this->getItems();
    }

    // fetch items belonghs to user
    public function getItems()
    {
        $user = auth()->user();
        $this->wishItems = $user->wishlists()->with('product.productImages', 'product.reviews')->get();
    }

    // trigger an event to add to wishlist
    public function addItem($productId, $id)
    {   
        $this->dispatch('addedToCart', $productId);
        $this->removeItem($id);
    }

    // remove and get the updated items. trigger span count 
    public function removeItem($id)
    {   
        Wishlist::where('id', $id)->delete();

        $this->getItems();
        $this->dispatch('updatedSpan');
    }

    public function render()
    {
        return view('livewire.wishlist-tab', ['items' => $this->wishItems]);
    }
}
