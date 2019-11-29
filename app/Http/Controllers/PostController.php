<?php

namespace App\Http\Controllers;
use App\pokemon;
use Illuminate\Support\Facades\Auth;
use App\post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with(['posts'=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pokemons= Pokemon::all();
        return view('post.create')->with(['pokemons'=>$pokemons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
           $input=$request->validated();
            $valores = array (
                        "subject" => $input['subject'],
                        "content"=>$input['content'],
                        "idpokemon"=>$input['idpokemon'],
                        "iduser"=>$id = Auth::id(),
                    );
        $post= new Post($valores);//momento magico
  
           
           
          try{
            $result = $post->save();
          }catch(\Exception $e){
           
        return redirect('post/'.$post->id.'edit');

        }

        return redirect(route('pokemon.index'));/*->with(['result'=> $result,'op'=>'store']);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
           function ver(){
             $pokemons= Post::all();
        return view('pokemon.ver')->with(['posts'=>$post]);
         }
}
