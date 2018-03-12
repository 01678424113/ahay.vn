<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table = 'comics';
    protected $primaryKey = 'comic_id';
    public $timestamps = false;

    public function userCreated()
    {
        return $this->belongsTo(User::class,'comic_created_by','user_id');
    }
    public function userUpdated()
    {
        return $this->belongsTo(User::class,'comic_updated_by','user_id');
    }


}
