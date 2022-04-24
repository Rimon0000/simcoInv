<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function productListName()
    {
        # code...
        return $this->hasOne(ProductList::class, 'product_id', 'product_id');
    }

    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }
}
