<?php

namespace App\Http\Controllers;
use App\post;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $comment= Comment::all();
            return view('comment.ver')->with(['comments'=>$comment]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('comment.create');   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
         $input=$request->validated();
          $valores = array (
                        "content" => $input['content'],
                        "idpost" =>  $input['idpost'],
                        "iduser"=> Auth::id(),
                    );
                    
    
         $comment= new Comment($valores);
         
          try{
            $result = $comment->save();
        }catch(\Exception $e){
           
        return redirect('comments/'.$comment->id.'edit');

        }

        return redirect(route('pokemon.index'));/*->with(['result'=> $result,'op'=>'store']);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
