<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ListProduct extends Component
{
    use WithPagination;

    
    // active filters to be pass from session
    public $categoryId;
    public $subcategoryId;
    public $minPrice;
    public $maxPrice;
    public $keyword;
    public $sortOption;

   // events to call refresh filter from other livewire 
    protected $listeners = [
        'filterUpdated'  => 'refreshFilters',
        'priceUpdated'   => 'refreshFilters',
        'categoryUpdated'=> 'refreshFilters',
        'clearFilters'   => 'refreshFilters',
        'searchUpdated'  => 'refreshFilters',
    ];

   // initialize with current active session 
    public function mount()
    {
        $this->refreshFilters();
    }

    // sync data from session and reset page
    public function refreshFilters()
    {
        $this->categoryId    = session('categoryId');
        $this->subcategoryId = session('subcategoryId');
        $this->minPrice      = session('minPrice');
        $this->maxPrice      = session('maxPrice');
        $this->keyword       = session('keyword');

        $this->resetPage();
    }

   // add to wishlist trigger to addToCart
    public function addToHeart($id)
    {
        $this->dispatch('addedToHeart', $id);
    }

    // add to cart trigger to addToCart
    public function addToCart($id)
    {
        $this->dispatch('addedToCart', $id);
    }

    
    // generate the list depending on active filters and sorts
    protected function buildQuery()
    {
        $query = Product::where('stock_quantity', '!=', 0)
            ->with(['category', 'productImages'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->withSum('orderItems', 'quantity');

        // Sorting options
        match ($this->sortOption) {
            'price_low_high' => $query->orderBy('regular_price', 'asc'),
            'price_high_low' => $query->orderBy('regular_price', 'desc'),
            'best'           => $query->orderBy('order_items_sum_quantity', 'desc'),
            'relevance'      => $query->orderBy('reviews_avg_rating', 'desc')
                                      ->orderBy('order_items_sum_quantity', 'desc'),
            default          => $query->latest(),
        };

        // Filters
        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        if ($this->subcategoryId) {
            $query->where('subcategory_id', $this->subcategoryId);
        }

        if ($this->minPrice) {
            $query->where(function ($q) {
                $q->where('discounted_price', '>=', $this->minPrice)
                  ->orWhere('regular_price', '>=', $this->minPrice);
            });
        }

        if ($this->maxPrice) {
            $query->where(function ($q) {
                $q->where('discounted_price', '<=', $this->maxPrice)
                  ->orWhere('regular_price', '<=', $this->maxPrice);
            });
        }

        if (!empty($this->keyword)) {
            $query->where(function ($q) {
                $q->where('product_name', 'like', "%{$this->keyword}%")
                  ->orWhere('description', 'like', "%{$this->keyword}%");
            });
        }

        return $query;
    }


    // render with products
    public function render()
    {
        return view('livewire.list-product', [
            'products' => $this->buildQuery()->paginate(12),
        ]);
    }
}
