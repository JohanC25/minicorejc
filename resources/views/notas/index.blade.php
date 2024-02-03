@extends('layouts.app')

@section('content')
    <h1>Lista de Notas</h1>

    <a href="{{ url('/') }}" style="margin-bottom: 20px; display: inline-block;">Regresar al Inicio</a>
    <a href="{{ route('notas.create') }}" style="margin-bottom: 20px; display: inline-block;">Agregar Nueva Nota</a>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">ID</th>
                <th style="border: 1px solid black;">Nota</th>
                <th style="border: 1px solid black;">Fecha Ingresada</th>
                <th style="border: 1px solid black;">ID del Estudiante</th>
                <th style="border: 1px solid black;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td style="border: 1px solid black;">{{ $nota->id }}</td>
                    <td style="border: 1px solid black;">{{ $nota->nota }}</td>
                    <td style="border: 1px solid black;">{{ $nota->fecha_ingresada }}</td>
                    <td style="border: 1px solid black;">{{ $nota->id_estudiante }}</td>
                    <td style="border: 1px solid black;">
                        <a href="{{ route('notas.show', $nota->id) }}">Ver</a>
                        <a href="{{ route('notas.edit', $nota->id) }}">Editar</a>
                        <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;">
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
