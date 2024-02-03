@extends('layouts.app')

@section('content')
    <h1>Agregar Nuevo Estudiante</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required>
        </div>

        <div>
            <button type="submit">Agregar Estudiante</button>
        </div>
    </form>
@endsection
