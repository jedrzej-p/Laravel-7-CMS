<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $table = 'posts';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
