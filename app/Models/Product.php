<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Store;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function vendor()
    {
        return $this->belongsTo(User::class);
    }
     public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
