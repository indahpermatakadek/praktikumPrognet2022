<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'transaction_details')->withPivot(['qty', 'selling_price', 'discount']);
    }

    public function courier(){
        return $this->belongsTo(Couriers::class);
    }

    public function transaction_detail(){
        return $this->hasMany(TransactionDetails::class);
    }
}
