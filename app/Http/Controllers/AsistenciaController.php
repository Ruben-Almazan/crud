<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Programa;
use App\Models\Prestador;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function formEntrada(Request $request)
    {
        $programas = Programa::all();
        $programa_id = $request->programa_id;

        if(!empty($programa_id))
        {
            //$prestadores = Prestador::where('programa_id', $progma_id)->get();
            $prestadores = Programa::find($programa_id)->prestadores()->get();
        }else{
            $prestadores = [];
        }
        return view('asistencias.entrada-form', compact('programas', 'prestadores', 'programa_id'));
    }

    public function registrarEntrada(Request $request)
    {
        $request->merge([
            'fecha' => today(),
            'entrada' => now(),
            'user_id' => Auth::id()
        ]);        
        Asistencia::create($request->all());
        return redirect()->route('asistencia.formEntrada');
    }

    public function formSalida(Request $request)
    {
        $asistencias = Asistencia::whereNull('salida')->with('programa', 'prestador')->get();
        return view('asistencias.salida-form', compact('asistencias'));
    }

    public function registrarSalida(Asistencia $asistencia)
    {
        $asistencia->salida = now();
        $asistencia->save();
        return redirect()->route('asistencia.formSalida');
    }
}
