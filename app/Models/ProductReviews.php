<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Response;
use App\Models\User;

class ProductReviews extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';

    public function product() { 
      return $this->belongsTo(Product::class);
    }

    public function response() { 
      return $this->hasMany(Response::class);
    }

    public function user() { 
      return $this->belongsTo(User::class);
    }
}
