<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MiniCoreController extends Controller
{
    public function index()
    {
        return view('minicore.index');
    }

    public function calcularProgreso(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fecha_desde_progreso1' => 'required|date|before:fecha_hasta_progreso1',
            'fecha_hasta_progreso1' => 'required|date|after:fecha_desde_progreso1',
            'fecha_desde_progreso2' => 'required|date|after:fecha_hasta_progreso1|before:fecha_hasta_progreso2',
            'fecha_hasta_progreso2' => 'required|date|after:fecha_desde_progreso2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $estudiantes = Estudiante::all();
        $resultados = [];

        foreach ($estudiantes as $estudiante) {
            $notasP1 = Nota::where('id_estudiante', $estudiante->id)
                ->whereBetween('fecha_ingresada', [$request->fecha_desde_progreso1, $request->fecha_hasta_progreso1])
                ->get();

            $notasP2 = Nota::where('id_estudiante', $estudiante->id)
                ->whereBetween('fecha_ingresada', [$request->fecha_desde_progreso2, $request->fecha_hasta_progreso2])
                ->get();

            $promedioP1 = $notasP1->avg('nota') * 0.25;
            $promedioP2 = $notasP2->avg('nota') * 0.35;

            $p3_necesario = max(0, 6 - ($promedioP1 + $promedioP2));

            $resultados[] = [
                'estudiante' => $estudiante->nombre_completo,
                'cantidad_notas_p1' => $notasP1->count(),
                'cantidad_notas_p2' => $notasP2->count(),
                'p1' => round($promedioP1, 2),
                'p2' => round($promedioP2, 2),
                'p3_necesario' => round($p3_necesario, 2),
            ];
        }

        Log::info('resultados - '.json_encode($resultados));

        return view('minicore.index', compact('resultados'));
    }

}
