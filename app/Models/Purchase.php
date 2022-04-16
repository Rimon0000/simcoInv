<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
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

    public function supplierName()
    {
        # code...
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function productName()
    {
        # code...
        return $this->hasOne(ProductList::class, 'product_id', 'product_code');
    }
}
