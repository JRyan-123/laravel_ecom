<div class="active-filters mb-3">
  
@if (session('categoryId') || session('subcategoryId') || session('minPrice') || session('maxPrice') || session('keyword'))
 
    <h5>Active Filters:</h5>

    <div class="d-flex flex-wrap gap-2">
        @forelse ($filters as $key => $filter)
          
                <span class="badge bg-dark d-flex align-items-center">
                     {{ $filter['name'] }}
                    <button type="button" class="btn-close btn-close-white btn-sm ms-2" 
                            wire:click="removeFilter('{{ $key }}')" 
                            aria-label="Remove"></button>
                </span>
          
         @empty
            <p class="text-muted mt-2">No active filters</p>
        @endforelse

      
            <button class="btn btn-danger btn-sm ms-2" wire:click="clearAll">
                Clear All
            </button>
   
    </div>

   
       
    @endif
</div>
