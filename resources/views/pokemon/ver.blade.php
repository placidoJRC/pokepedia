

@extends('index');

@section('content')

<style type="text/css">
             img{
                 width:200px;
                 height:200px;
             }
         </style>
<table class="table table-striped table-hover">
        @foreach($pokemons as $pokemon)

    <tr>
        <td>nombre</td>
        <td>
            {{ $pokemon->pokemon->nombre }}
        </td>

        <td>peso</td>
        <td>
            {{ $pokemon->pokemon->peso }}
        </td>

        <td>estatura</td>
        <td>
            {{ $pokemon->pokemon->estatura }}
        </td>

        <td>imagen  </td>
        <td>

         <img src=" {{asset('assets/img/')}}/{{ $pokemon->pokemon->imagen }}"> </img> 
        </td>

        <td>abilidad</td>
        <td>
            {{ $pokemon->ability->ability }}
        </td>
        <td>
        <a href="{{ route('pokemon.edit',['id'=>$pokemon->pokemon->id]) }}" class="btn btn-info">ver</a>
         </td>
    </tr>
       @endforeach


</table>
{{ $pokemons->appends(['sort' => 'nombre'])->onEachSide(2)->links() }}
<a href="{{ url('') }}" class="btn btn-info">volver</a>
<hr>

@endsection