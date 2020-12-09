<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'timestamp'
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
