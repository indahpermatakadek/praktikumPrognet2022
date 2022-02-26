<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_image(){
        return $this->hasOne(product_images::class);
    }

    public function discount(){
        return $this->hasMany(discounts::class);
    }

    public function cart(){
        return $this->hasMany(carts::class);
    }

    public function product_category_detail(){
        return $this->hasMany(product_category_details::class);
    }

    public function product_review(){
        return $this->hasMany(product_reviews::class);
    }

    public function transaction_detail(){
        return $this->hasMany(transaction_details::class);
    }
}
