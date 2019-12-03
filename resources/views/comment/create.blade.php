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
<form action="{{ url('comment') }}" method="post"enctype="multipart/form-data">
@csrf
<input type="text" name="content" id="content" placeholder="content" required maxlength="50" value="{{ old('content') }}">

 <input type="hidden" name="idpost" value="<?php echo $_GET['id'];?>" />


<a href="{{ url('') }}" class="btn btn-info">volver</a>
<input type="submit" class="btn btn-primary" value="agregar">
</form>
@endsection