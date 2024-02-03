@extends('layouts.app')

@section('content')
    <h1>Editar Nota</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notas.update', $nota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" value="{{ $nota->nota }}" required>
        </div>
        <div>
            <label for="fecha_ingresada">Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingresada" name="fecha_ingresada" value="{{ $nota->fecha_ingresada }}" required>
        </div>
        <div>
            <label for="id_estudiante">ID del Estudiante:</label>
            <input type="number" id="id_estudiante" name="id_estudiante" value="{{ $nota->id_estudiante }}" required>
        </div>
        <div>
            <button type="submit">Actualizar Nota</button>
        </div>
    </form>
@endsection
