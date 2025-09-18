<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
    // fetch sold items with no reviews belongs to user
    public function scopeToReviews($query, $user_id)
    {
        return $query->with('product.productImages')
                    ->whereHas('order', fn ($q) => $q->where('user_id', $user_id))
                    ->whereDoesntHave('reviews');
    }
}
