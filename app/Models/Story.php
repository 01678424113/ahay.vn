<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

    protected $table = 'stories';
    protected $primaryKey = 'story_id';
    public $timestamps = false;

}
