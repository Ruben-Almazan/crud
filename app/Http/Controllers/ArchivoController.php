<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::all();
        return view('archivos.archivo-index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.archivo-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('admin-programas')){
            abort(403);
        }
        if($request->hasFile('archivo') && $request->file('archivo')->isValid())
        {
            $ruta = $request->archivo->store('documentos');
            $archivo = new Archivo();
            $archivo->ruta = $ruta;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getMimeType();
            $archivo->save();
        }
        return redirect()->route('archivo.index')->with('status', 'Nuevo Archivo Guardado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function descargar(Archivo $archivo)
    {       
        if(!Gate::allows('admin-programas')){
            abort(403);
        }
        return Storage::download($archivo->ruta, $archivo->nombre_original, ['Content-Type' => $archivo->mime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        if(!Gate::allows('admin-programas')){
            abort(403);
        }
        $archivo->delete(); 
       $archivo = new Archivo();
        return view('archivos.archivo-form')->with('status', 'Archivo Editado Exitosamente');    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        if(!Gate::allows('admin-programas')){
            abort(403);
        }
        $archivo->delete();
        return redirect()->route('archivo.index')->with('status', 'Archivo Eliminado Exitosamente');
    }
}
