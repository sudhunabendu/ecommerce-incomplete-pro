<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function cart(){

        return $this->belongsTo(Cart::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    
    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }

    
}
