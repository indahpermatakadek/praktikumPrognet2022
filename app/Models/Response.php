<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins;

class Response extends Model
{
    use HasFactory;

    protected $table = 'responses';
    
    public function admins() { 
      return $this->belongsTo(Admins::class);
    }
}
