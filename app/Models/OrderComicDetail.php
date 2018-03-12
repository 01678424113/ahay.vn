<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderComicDetail extends Model
{
    protected $table = 'order_comic_details';
    public $timestamps = false;
    public $primaryKey = 'order_detail_comic_id';
}
