<?php

namespace App\Livewire;

use Livewire\Component;

class SearchFilter extends Component
{
    public $inputKeyword = null;

    protected $listeners = ['filterUpdated' => '$refresh'];

    // after searching reset all session
    // refresh activefilter livewire and listProduct
    public function search()
    {   
        session(['keyword' => $this->inputKeyword]);
        if ($this->inputKeyword) {
                session()->flush();
        }
        $this->dispatch('searchUpdated');
        $this->dispatch('filterUpdated');
        return redirect()->route('category');
    }

    public function render()
    {
        return view('livewire.search-filter');
    }
}
