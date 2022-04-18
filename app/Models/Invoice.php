<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function customerName()
    {
        # code...
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
