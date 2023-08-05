<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * モデルと関連しているテーブル:posts
     *
     * @var string
     */
    protected $table = 'posts';
    protected $guarded = [];
}
