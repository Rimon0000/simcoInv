<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }

    public function unitName()
    {
        # code...
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function productListName()
    {
        # code...
        return $this->hasOne(ProductList::class, 'id', 'product_id');
    }
}
