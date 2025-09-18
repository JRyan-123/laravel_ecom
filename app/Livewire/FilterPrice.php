<?php

namespace App\Livewire;

use Livewire\Component;

class FilterPrice extends Component
{
    
    public $minPrice;
    public $maxPrice;

   // initialize min max values. def 0 - 500
    public function mount()
    {
        $this->minPrice = session('minPrice', 0);
        $this->maxPrice = session('maxPrice', 500);
    }

   
   // apply input price
    public function applyPrice()
    {
        session([
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);

        // Dispatch events for reactive updates
        $this->dispatch('priceUpdated');
        $this->dispatch('filterUpdated');
    }


    public function render()
    {
        return view('livewire.filter-price');
    }
}
