<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = false;

  /*  public function category() {
        return $this->belongsTo(Category::class);
    }

    public function userCreated() {
        return $this->belongsTo(User::class, 'product_created_by', 'user_id');
    }

    public function userUpdated() {
        return $this->belongsTo(User::class, 'product_updated_by', 'user_id');
    }
 */
}
