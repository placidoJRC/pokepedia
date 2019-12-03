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
<form action="{{ url('pokemon') }}" method="post"enctype="multipart/form-data">
@csrf
<input type="text" name="nombre" id="nombre" placeholder="nombre" required maxlength="50" value="{{ old('nombre') }}">
<input type="number" name="peso" id="peso" placeholder="peso" value="{{ old('peso') }}">
<input type="number"  name="estatura" id="estatura" placeholder="estatura" value="{{ old('estatura') }}">
<input type="file" name="imagen" id="imagen">
<input type="text" name="ability" id="ability" placeholder="ability" required maxlength="50" value="{{ old('ability') }}">



<a href="{{ url('') }}" class="btn btn-info">volver</a>
<input type="submit" class="btn btn-primary" value="agregar">
</form>
@endsection