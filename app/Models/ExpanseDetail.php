<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpanseDetail extends Model
{
    use HasFactory;
    
    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }

    public function expanseName()
    {
        # code...
        return $this->hasOne(ExpanseType::class, 'id', 'fixed_expanse');
    }
}
