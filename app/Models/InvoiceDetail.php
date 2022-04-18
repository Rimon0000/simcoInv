<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }

    public function productName()
    {
        # code...
        return $this->hasOne(ProductList::class, 'id', 'product_name');
    }

    public function categoryName()
    {
        # code...
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    public function unitName()
    {
        # code...
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}
