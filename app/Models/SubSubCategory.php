<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
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

    public function subCategoryName()
    {
        # code...
        return $this->hasOne(SubCategory::class, 'id', 'sub_cat_id');
    }
}