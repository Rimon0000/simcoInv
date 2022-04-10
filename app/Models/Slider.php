<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    public function productListName()
    {
        # code...
        return $this->hasOne(ProductList::class, 'id', 'product_code');
    }
}
