<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_categories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_category_detail(){
        return $this->hasMany(product_category_details::class);
    }
}
