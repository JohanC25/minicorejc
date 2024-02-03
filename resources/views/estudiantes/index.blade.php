@extends('layouts.app')

@section('content')
    <h1>Lista de Estudiantes</h1>

    <a href="{{ url('/') }}" style="margin-bottom: 20px; display: inline-block;">Regresar al Inicio</a>
    <a href="{{ route('estudiantes.create') }}" style="margin-bottom: 20px; display: inline-block;">Agregar Nuevo Estudiante</a>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">ID</th>
                <th style="border: 1px solid black;">Nombre Completo</th>
                <th style="border: 1px solid black;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td style="border: 1px solid black;">{{ $estudiante->id }}</td>
                    <td style="border: 1px solid black;">{{ $estudiante->nombre_completo }}</td>
                    <td style="border: 1px solid black;">
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}">Ver</a>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="display: inline;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
