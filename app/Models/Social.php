<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }
}
