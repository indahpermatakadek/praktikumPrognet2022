<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rensponse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function product_review(){
        return $this->belongsTo(product_reviews::class);
    }
}
