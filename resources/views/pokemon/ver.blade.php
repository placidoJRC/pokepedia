




<table class="table table-striped table-hover">
        @foreach($pokemons as $pokemon)

    <tr>
        <td>id</td>
        <td>
            {{ $pokemon->pokemon->id }}
        </td>

        <td>peso</td>
        <td>
            {{ $pokemon->pokemon->peso }}
        </td>

        <td>estatura</td>
        <td>
            {{ $pokemon->pokemon->estatura }}
        </td>

        <td>imagen</td>
        <td>
            {{ $pokemon->pokemon->imagen }}
        </td>

        <td>abilidad</td>
        <td>
            {{ $pokemon->ability->ability }}
        </td>
    </tr>
       @endforeach

</table>

<a href="{{ route('pokemon.index') }}" class="btn btn-info">volver</a>

