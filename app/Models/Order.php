<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    public $timestamps = false;
    public $primaryKey = 'order_id';
}