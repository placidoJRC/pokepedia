<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class abilityPokemon extends Model
{
   use SoftDeletes; 

    protected $table = 'ability_pokemon';
    

    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['idability', 'idpokemon']; 
    
    public function ability() {
        return $this->belongsTo('App\ability', 'idability');
    }
    
        public function pokemon() {
        return $this->belongsTo('App\pokemon', 'idpokemon');
    }
}
