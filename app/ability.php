<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ability extends Model
{
    use SoftDeletes; 

    protected $table = 'abilities';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['ability']; 
    

    
           public function abilityPokemon() {
        return $this->hasMany('App\AbilityPokemon');
    }
    
}
