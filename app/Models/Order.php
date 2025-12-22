<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['product_name', 'customer_name', 'contact', 'address'];
}
