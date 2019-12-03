<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
  use SoftDeletes; 

    protected $table = 'posts';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['subject','content', 'idpokemon','iduser']; 
    
            public function pokemon() {
        return $this->belongsTo('App\pokemon', 'idpokemon');
    }
    
            public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
}

