<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    // calculate subtotal (price x qty)
    public function getSubtotalAttribute()
    {
        return $this->items->sum(fn($item) => $item->price * $item->quantity);
    }

    // calcualte tax 
    public function getTaxAttribute()
    {
        return $this->subtotal * 0.12;
    }

   // claculate total
    public function getTotalAttribute()
    {
        return $this->subtotal + $this->tax + $this->shipping;
    }

   // get the first 3 products image 
    public function getFirstThreeImagesAttribute()
    {
        return $this->items->take(3)
            ->map(fn($item) => $item->product->productImages->first()->image_path ?? 'product_images/no-image.jpg')
            ->all();
    }

    // get the count of the remaining prod
    public function getRemainingProductsAttribute()
    {
        return max($this->items->count() - 3, 0);
    }
}
