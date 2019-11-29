<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pokemon extends Model
{
    use SoftDeletes; 

    protected $table = 'pokemon';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['nombre', 'peso','estatura','imagen']; 
    
       public function posts() {
        return $this->hasMany('App\post');
    }
    
       public function abilityPokemon() {
        return $this->hasMany('App\abilityPokemon');
    }
    
}
