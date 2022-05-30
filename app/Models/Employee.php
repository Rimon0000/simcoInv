<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function userName()
    {
        # code...
        return $this->hasOne(user::class, 'id', 'created_by');
    }
    
    public function designationName()
    {
        # code...
        return $this->hasOne(Designation::class,'id','designation');
    }

    public function departmentName()
    {
        # code...
        return $this->hasOne(Department::class,'id','department');
    }
}
