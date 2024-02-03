@extends('layouts.app') 

@section('content')
    <h1>Editar Estudiante</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" value="{{ $estudiante->nombre_completo }}" required>
        </div>

        <div>
            <button type="submit">Actualizar Estudiante</button>
        </div>
    </form>
@endsection
