<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_notifications extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function admin(){
        return $this->belongsTo(admins::class);
    }
}
