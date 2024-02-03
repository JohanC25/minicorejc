@extends('layouts.app')

@section('content')
    <h1>Detalles del Estudiante</h1>

    <div>
        <strong>ID:</strong> {{ $estudiante->id }}
    </div>
    <div>
        <strong>Nombre Completo:</strong> {{ $estudiante->nombre_completo }}
    </div>

    <a href="{{ route('estudiantes.index') }}">Volver a la lista</a>
@endsection
