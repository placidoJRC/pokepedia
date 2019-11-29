<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilityPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_pokemon', function (Blueprint $table) {
                        $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->bigInteger('idpokemon')->unsigned();
            $table->bigInteger('idability')->unsigned();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['idpokemon', 'idability']);
            
            $table->foreign('idpokemon')->references('id')->on('pokemon');
            $table->foreign('idability')->references('id')->on('abilities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_pokemon');
    }
}
