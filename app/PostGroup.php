<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGroup extends Model
{
    public $timestamps = false;
    protected $table = 'post_groups';

    public function post()
    {
        return $this->hasOne('App\Post', 'id', 'group_id');
    }
}
