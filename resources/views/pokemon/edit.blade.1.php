@extends('base')
@section('contenido') 

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('producto/'.$producto->id) }}" method="post">
@csrf
@method('PUT') 
{{ $producto->id }}
<input type="text" name="nombre" id="nombre" placeholder="nombre" required maxlength="50" value="{{ old('nombre',$producto->nombre) }}">
<input type="text" name="descripcion" id="descripcion" placeholder="descripcion" maxlength="255" value="{{ old('descripcion',$producto->descripcion) }}">
<input type="number" min="0.00" max="10000.00" step="0.001" name="precio" id="precio" placeholder="precio" value="{{ old('precio',$producto->precio) }}">
<input type="number" min="0.00" max="1.00" step="0.01" name="iva" id="iva" placeholder="iva" value="{{ old('iva',$producto->iva) }}">
<input type="number" min="0.00" max="1.00" step="0.01" name="descuento" id="descuento" placeholder="descuento" value="{{ old('descuento',$producto->descuento) }}">
<textArea class="form-control" name="observaciones" id="observaciones" placeholder="observaciones">{{ old('observaciones',$producto->observacion) }}</textArea>
<a href="{{ route('producto.index') }}" class="btn btn-info">volver</a>
<input type="submit" class="btn btn-primary" value="editar">
</form>
@stop