<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class OrdersTab extends Component
{
    use WithPagination;

   // sortby Status
    public $status = '';

    
    // Reset page on change statys
    public function updating($name)
    {
        if ($name === 'status') {
            $this->resetPage();
        }
    }

    public function queryBuilder()
    {
         $user = auth()->user();

        $query = $user->orders()
            ->with(['items.product.productImages', 'payment', 'address'])
            ->orderBy('id', 'desc');

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query;
    }
    public function render()
    {
        return view('livewire.orders-tab', [
            'orders' => $this->queryBuilder()->paginate(3),
        ]);
    }
}
