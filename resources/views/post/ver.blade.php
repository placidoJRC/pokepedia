


@extends('index');

@section('content')


<table class="table table-striped table-hover">
        @foreach($posts as $post)

    <tr>
        <td>subject</td>
        <td>
            {{ $post->subject }}
        </td>

        <td>nombre</td>
        <td>
            {{ $post->pokemon->nombre }}
        </td>

        <td>contenido</td>
        <td>
            {{ $post->content }}
        </td>

        <td>usuario</td>
        <td>
            {{ $post->user->name }}
        </td>
        <td>
<a href="{{ route('comment.create',['id'=>$post->id]) }}" class="btn btn-info">añadir comentarios</a>
<a href="{{ route('comment.index',['id'=>$post->id]) }}" class="btn btn-info">ver comentarios</a>

</td>
    </tr>
       @endforeach

</table>

<a href="{{ route('pokemon.index') }}" class="btn btn-info">volver</a>

@endsection