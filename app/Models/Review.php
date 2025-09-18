<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function items() {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }

    // fetch items with review belongs to user
    public function scopeDoneReviews($query, $user_id)
    {
        return $query->where('user_id', $user_id)
                    ->with('product.productImages');
    }
}
