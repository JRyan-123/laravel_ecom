<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarRating extends Component
{
    public $rating;
    public $reviews;
    public $showValue;
    
    public function __construct($rating, $reviews = null, $showValue = false)
    {
        $this->rating = $rating;
        $this->reviews = $reviews;
        $this->showValue = $showValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.star-rating');
    }
}
