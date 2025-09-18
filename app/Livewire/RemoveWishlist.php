<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;

class RemoveWishlist extends Component
{   
    public $id;

    // remove wishlist item, call event to update span count
    public function removeItem($id)
    {   
        Wishlist::where('id', $id)->delete();

        $this->dispatch('updatedSpan');
    }
    public function render()
    {
        return view('livewire.remove-wishlist');
    }
}
