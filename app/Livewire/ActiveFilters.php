<?php

namespace App\Livewire;

use Livewire\Component;

class ActiveFilters extends Component
{   
    // refresh on call
    protected $listeners = [
        'filterUpdated' => '$refresh',
    ];

    // keys used for storing in session
    protected $filterKeys = [
        'categoryId', 'categoryName',
        'subcategoryId', 'subcategoryName',
        'minPrice', 'maxPrice',
        'keyword',
    ];

    // removing single filter key
    public function removeFilter($key)
    {
        // removing id and name for category and subcategory
        if ($key === 'categoryId') {
            session()->forget(['categoryId', 'categoryName']);
        } elseif ($key === 'subcategoryId') {
            session()->forget(['subcategoryId', 'subcategoryName']);
        } else {
            session()->forget($key);
        }

        $this->dispatch('filterUpdated');
    }

    // clear all active filters
    public function clearAll()
    {
        session()->forget($this->filterKeys);
        $this->dispatch('filterUpdated');
    }

    // store active filters to display in blade
    protected function getActiveFilters()
    {
        $filters = [];
        $data = session()->only($this->filterKeys);

        if (!empty($data['keyword'])) {
            $filters['keyword'] = [
                'name' => "Searching for '{$data['keyword']}'",
            ];
        }

        if (!empty($data['categoryId']) && !empty($data['categoryName'])) {
            $filters['categoryId'] = [
                'name' => $data['categoryName'],
            ];
        }

        if (!empty($data['subcategoryId']) && !empty($data['subcategoryName'])) {
            $filters['subcategoryId'] = [
                'name' => $data['subcategoryName'],
            ];
        }

        if (!empty($data['minPrice'])) {
            $filters['minPrice'] = [
                'name' => "Min Price: {$data['minPrice']}",
            ];
        }

        if (!empty($data['maxPrice'])) {
            $filters['maxPrice'] = [
                'name' => "Max Price: {$data['maxPrice']}",
            ];
        }

        return $filters;
    }


    // render with stored filters
    public function render()
    {
        return view('livewire.active-filters', [
            'filters' => $this->getActiveFilters(),
        ]);
    }
}
