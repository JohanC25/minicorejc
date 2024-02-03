<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::all();
        return view('notas.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('notas.create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nota' => 'required|numeric',
            'fecha_ingresada' => 'required|date',
            'id_estudiante' => 'required|exists:estudiantes,id'
        ]);

        Nota::create($validatedData);

        return redirect()->route('notas.index')->with('success', 'Nota creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        return view('notas.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        $estudiantes = Estudiante::all();
        return view('notas.edit', compact('nota', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        $validatedData = $request->validate([
            'nota' => 'required|numeric',
            'fecha_ingresada' => 'required|date',
            'id_estudiante' => 'required|exists:estudiantes,id'
        ]);

        $nota->update($validatedData);

        return redirect()->route('notas.index')->with('success', 'Nota actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota eliminada con éxito.');
    }
}
