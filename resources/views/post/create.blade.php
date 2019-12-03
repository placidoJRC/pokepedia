@extends('index');

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('post') }}" method="post"enctype="multipart/form-data">
@csrf
<input type="text" name="subject" id="subject" placeholder="subject" required maxlength="50" value="{{ old('subject') }}">

<input type="text" name="content" id="content" placeholder="content" required maxlength="50" value="{{ old('content') }}">
        <select name="idpokemon" id="idpokemon">
             <option value=""></option>
             @foreach ($pokemons as $pokemon)
            <option value="{{ $pokemon->id }}" @if(intval(old('idpokemon') === $pokemon->id))selected @endif>{{ $pokemon }}</option>
            @endforeach
            </select>
            
                   



<a href="{{ url('') }}" class="btn btn-info">volver</a>
<input type="submit" class="btn btn-primary" value="agregar">
</form>
@endsection