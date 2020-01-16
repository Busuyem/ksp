<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{

    public function user(){
        return $this->belongsTo(User::Class);
    }
    
    public function post(){
        return $this->belongsTo(Post::Class);
    }
}
