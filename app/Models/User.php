<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function articleCreated()
    {
        return $this->hasMany(Article::class,'user_id','article_created_by');
    }
    public function articleUpdated()
    {
        return $this->hasMany(Article::class,'user_id','article_updated_by');
    }


    public function comicCreated()
    {
        return $this->hasMany(Comic::class,'user_id','article_created_by');
    }
    public function comicUpdated()
    {
        return $this->hasMany(Comic::class,'user_id','article_updated_by');
    }


    public function productCreated()
    {
        return $this->hasMany(Product::class,'user_id','product_created_by');
    }
    public function productUpdated()
    {
        return $this->hasMany(Product::class,'user_id','product_updated_by');
    }

}
