<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'CustomerID');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'ProductID');
    }
}
