<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductImage extends Model
{   
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getDisplayImageAttribute()
    {
        // get the image path
        if (!empty($this->image_path)) {
            return asset('storage/' . $this->image_path);
        }

        // if no image
        return asset('storage/no-image.jpg');
    }
}
