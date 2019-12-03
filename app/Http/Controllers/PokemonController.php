<?php

namespace App\Http\Controllers;
use App\pokemon;
use Illuminate\Http\Request;
use App\Http\Requests\PokemonRequest;
use App\ability;
use App\abilityPokemon;



class PokemonController extends Controller
{
    public function inicio(){
            return view('pokemon.index');

    }     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $pokemons= abilityPokemon::paginate(5);
        return view('pokemon.ver')->with(['pokemons'=>$pokemons]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $pokemons= Pokemon::all();
        return view('pokemon.create')->with(['pokemons'=>$pokemons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
    {
        $name="";
        if($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        $file = $request->file('imagen');
        $target = '../public/assets/img';
        $name = $file->getClientOriginalName();
        $file->move($target, $name);
        }
         $input=$request->validated(); //array asociativo con los valores validados y limpiados
         $valores = array (
                        "nombre" => $input['nombre'],
                        "peso"=>$input['peso'],
                        "estatura"=>$input['estatura'],
                        "imagen"=>$name,
                    );
        $pokemon= new Pokemon($valores);//momento magico
              $valores = array (
                        "ability" => $input['ability'],
                    );
                
        $ability= new Ability($valores);//momento magico
           
          try{
            $result = $pokemon->save();
            $result = $ability->save();
                         $valores = array (
                        "idability" => $ability->id,
                        "idpokemon" => $pokemon->id,
                    );
        $abilityPokemon= new AbilityPokemon($valores);//momento magico
            $result = $abilityPokemon->save();



        }catch(\Exception $e){
           
        return redirect('pokemon/'.$pokemon->id.'edit');

        }

        return redirect(route('pokemon.index'));/*->with(['result'=> $result,'op'=>'store']);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(pokemon $pokemon)
    {
         return view('pokemon.show')->with(['pokemon'=> $pokemon]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(pokemon $pokemon)
    {
         return view ('pokemon.edit')->with(['pokemon'=> $pokemon]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(PokemonRequest $request, pokemon $pokemon)
    {
        
         $input=$request->validated();
         try{
        $result =$pokemon->update($input);
        }catch(\Exception $e){
            $result = false;
         $error=['nombre'=>'El nombre utilizado ya existe en otro producto'];
        return redirect('pokemon/'.$pokemon->id.'edit')->withErrors($error)->withInput();
        }
        return redirect(route('pokemon.index'))->with(['result'=>$result,'op'=>'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(pokemon $pokemon)
    {
        try{
            $result = $pokemon->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
                return redirect(route('pokemon.index'))->with(['result'=>$result,'op'=>'destroy']);

    
    
    }
    
    function upload(PokemonRequest $request) {
        if($request->hasFile('file') && $request->file('file')->isValid()) {
        $file = $request->file('file');
        $target = '../../../upload/';
        $name = $file->getClientOriginalName();
        $file->move($target, $name);
        }
        return redirect('index');
        // return response()->file($target . $name);
        }
        

}

