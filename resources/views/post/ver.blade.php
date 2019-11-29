




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
            {{ $post->contenido }}
        </td>

        <td>imagen</td>
        <td>
            {{ $pokemon->user->id }}
        </td>


    </tr>
       @endforeach

</table>

<a href="{{ route('pokemon.index') }}" class="btn btn-info">volver</a>

