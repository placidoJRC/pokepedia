<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use SoftDeletes; 

    protected $table = 'comments';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['content', 'idpost','iduser']; 
    
            public function post() {
        return $this->belongsTo('App\post', 'idpost');
    }
    
            public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
}
