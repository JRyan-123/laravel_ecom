<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderItem;
use Livewire\WithPagination;
use App\Models\Review;

class ToReviewsTab extends Component
{
    use WithPagination;
    // gets review/rating
    public $review = [];
    public $rating = [];

    // default tab 
    public $activeTab = 'completed'; 

    // saving review for each product
    public function saveReview($itemId)
    {
        $this->validate([
        "rating.$itemId" => 'required|integer|min:1|max:5',
        "review.$itemId" => 'string|max:255',
        ]);

        // fetch items to transfer into review ids
        $orderItem = OrderItem::with('order', 'product')->findOrFail($itemId);

        Review::create([
            'user_id' => $orderItem->order->user_id,
            'product_id' => $orderItem->product_id,
            'order_id'   => $orderItem->order->id,
            'order_item_id' => $orderItem->id,
            'review' => $this->review[$itemId],
            'rating' => $this->rating[$itemId],
        ]);

        // discard array created review
        unset($this->review[$itemId], $this->rating[$itemId]);

        $this->dispatch('toast.success', message: 'review added');
    }

    // render with sold items with and without reviews
    public function render()
    {   
        $user_id = auth()->id();
        
        return view('livewire.to-reviews-tab',[
            'reviews' => Review::DoneReviews($user_id)->latest()->paginate(5, ['*'], 'reviewsPage'),
            'toReviews' => OrderItem::ToReviews($user_id)->paginate(5, ['*'], 'toReviewsPage')

        ]);
    }
}
  
