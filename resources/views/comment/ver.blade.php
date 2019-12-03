


@extends('index');

@section('content')


<table class="table table-striped table-hover">
        @foreach($comments as $comment)

    <tr>
        <?php 
        $noExisten=true;
        if( $comment->idpost == $_GET['id']){
            $noExisten=false;
        
?>
        <td>contenido</td>
        <td>
            
            {{ $comment->content }}
           

        </td>

</td>
    </tr>
    <?php 
        }
?>
       @endforeach

</table>

<?php  if($noExisten)echo '<h1>no hay comentarios para este post</h1>';?>
<a href="{{ route('post.index') }}" class="btn btn-info">volver</a>

@endsection