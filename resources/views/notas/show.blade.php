@extends('layouts.app')

@section('content')
    <h1>Detalles de la Nota</h1>

    <div>
        <strong>ID:</strong> {{ $nota->id }}
    </div>
    <div>
        <strong>Nota:</strong> {{ $nota->nota }}
    </div>
    <div>
        <strong>Fecha Ingresada:</strong> {{ $nota->fecha_ingresada }}
    </div>
    <div>
        <strong>ID del Estudiante:</strong> {{ $nota->id_estudiante }}
    </div>

    <a href="{{ route('notas.index') }}">Volver a la lista</a>
@endsection
