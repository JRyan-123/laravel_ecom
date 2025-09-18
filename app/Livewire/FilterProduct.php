<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class FilterProduct extends Component
{

    
    protected $listeners = ['filterUpdated' => '$refresh'];

    // set session category
    public function selectCategory($id, $name)
    {
        $this->subcategoryId = null; 
        session(['categoryId' => $id, 
            'categoryName' => $name,
            'subcategoryId' => null,
            'subcategoryName' => null,
            ]);

        $this->dispatch('categoryUpdated');
        $this->dispatch('filterUpdated');
    }

    // set session subcategory
    public function selectSubcategory($id, $name)
    {

        session(['subcategoryId' => $id, 
            'subcategoryName' => $name,
            ]);

        $this->dispatch('subcategoryUpdated');
        $this->dispatch('filterUpdated');
    }

    public function render()
    {
        return view('livewire.filter-product', [
            'categories' => Category::with('subcategories')->get(),
        ]);
    }
}
