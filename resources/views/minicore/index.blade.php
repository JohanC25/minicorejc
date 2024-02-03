@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Calcular Progreso 3</h2>
    <form method="POST" action="{{ route('minicore.calcular_progreso') }}">
        @csrf
        <div class="row">
            <div class="col border">
                <h3>P1 (25%)</h3>
                <div class="form-group">
                    <label for="fecha_desde_progreso1">Fecha Inicio Progreso 1:</label>
                    <input type="date" class="form-control" id="fecha_desde_progreso1" name="fecha_desde_progreso1" required>
                </div>
                <div class="form-group">
                    <label for="fecha_hasta_progreso1">Fecha Fin Progreso 1:</label>
                    <input type="date" class="form-control" id="fecha_hasta_progreso1" name="fecha_hasta_progreso1" required>
                </div>
            </div>
            <div class="col border">
                <h3>P2 (35%)</h3>
                <div class="form-group">
                    <label for="fecha_desde_progreso2">Fecha Inicio Progreso 2:</label>
                    <input type="date" class="form-control" id="fecha_desde_progreso2" name="fecha_desde_progreso2" required>
                </div>
                <div class="form-group">
                    <label for="fecha_hasta_progreso2">Fecha Fin Progreso 2:</label>
                    <input type="date" class="form-control" id="fecha_hasta_progreso2" name="fecha_hasta_progreso2" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Calcular</button>
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Regresar al Inicio</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($resultados) && count($resultados) > 0)
        <div class="mt-3">
            <h3>Resultados:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th># Notas</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3 (Para alcanzar 6)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $resultado)
                        <tr>
                            <td>{{ $resultado['estudiante'] }}</td>
                            <td>{{ $resultado['cantidad_notas_p1'] + $resultado['cantidad_notas_p2'] }}</td>
                            <td>{{ $resultado['p1'] }}</td>
                            <td>{{ $resultado['p2'] }}</td>
                            <td>{{ $resultado['p3_necesario'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning mt-3">No hay datos para mostrar con los parámetros ingresados.</div>
    @endif
</div>
@endsection
