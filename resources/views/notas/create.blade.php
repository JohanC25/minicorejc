@extends('layouts.app')

@section('content')
    <h1>Agregar Nueva Nota</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf
        <div>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" required>
        </div>
        <div>
            <label for="fecha_ingresada">Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingresada" name="fecha_ingresada" required>
        </div>
        <div>
            <label for="id_estudiante">ID del Estudiante:</label>
            <input type="number" id="id_estudiante" name="id_estudiante" required>
        </div>
        <div>
            <button type="submit">Agregar Nota</button>
        </div>
    </form>
@endsection
