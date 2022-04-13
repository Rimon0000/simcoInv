<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
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
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function subCategoryName()
    {
        # code...
        return $this->hasOne(SubCategory::class, 'id', 'sub_category');
    }

    public function subSubCategoryName()
    {
        # code...
        return $this->hasOne(SubSubCategory::class, 'id', 'sub_sub_category');
    }

    public function brandName()
    {
        # code...
        return $this->hasOne(Brand::class, 'id', 'brand');
    }
    
    public function displaySection()
    {
        # code...
        return $this->hasOne(DisplaySection::class, 'id', 'display_section');
    }

    public function unitName()
    {
        # code...
        return $this->hasOne(Unit::class, 'id', 'unit');
    }

    public function originName()
    {
        # code...
        return $this->hasOne(Origin::class, 'id', 'origin');
    }

}
