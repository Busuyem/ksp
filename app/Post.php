<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    public function path(){
        
        return url("post/{$this->id}-". Str::slug($this->post_title));

    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function likes(){
        return $this->hasMany(Like::Class);
    }

    public function disLikes(){
        return $this->hasMany(Dislike::Class);
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
