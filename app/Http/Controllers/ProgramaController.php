<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Programa;
use App\Models\Prestador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class ProgramaController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->middleware('auth')->except('show');
        //$this->authorizeResource(Programa::class, 'programa');

        $this->rules = [
            'nombre_titular' => ['required', 'string', 'min:2', 'max:255'],
            'cabana' => ['required', 'string', 'min:1', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'dias' => ['required', 'integer', 'min:1', 'max:14'],
            'pago' => ['required', 'string', 'min:2', 'max:50']       
        ];
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$programas = Programa::all();
        if(Gate::allows('admin-programas')){
            $programas = Programa::with('user:id,name')->get();
        }else{
            $programas = Auth::user()->programas()->get();
        }
        
        //$programas = Programa::with('user:id,name')->get();
        return view('programa.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create');
        return view('programa.programaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        /*$programa = new Programa();
        $programa->calendario = $request->calendario;
        $programa->folio = $request->folio;
        $programa->programa = $request->programa;
        $programa->dependencia = $request->dependencia;
        $programa->titular = $request->titular;        
        $programa->save();
        return redirect()->route('programa.index');*/
        //Gate::authorize('admin-programas');
        $request->validate($this->rules);
        $request->merge(['user_id' => $request->user()->id]);
        Programa::create($request->all());
        return redirect()->route('programa.index')->with('status', 'Nuevo Registro Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        if(!Gate::allows('admin-programas')){
            abort(403);
        }
        $prestadores = Prestador::get();
        return view('programa.programaShow', compact('programa', 'prestadores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        $this->authorize('update', $programa);
        return view('programa.programaForm', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        /*if($request->user()->cannot('update', $programa)) {
            abort(403);
        }*/
        $request->validate($this->rules);
        $programa->nombre_titular = $request->nombre_titular;
        $programa->cabana = $request->cabana;
        $programa->telefono = $request->telefono;
        $programa->dias = $request->dias;
        $programa->pago = $request->pago;        
        $programa->save();
        return redirect()->route('programa.show', $programa)->with('status', 'Registro Editado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('programa.index')->with('status', 'Registro Eliminado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function agregaPrestador(Request $request, Programa $programa)
    {
        //dd($request->all(), $programa);
        $programa->prestadores()->sync($request->prestador_id);
        return redirect()->route('programa.show', $programa);
    }

    public function documento(Programa $programa)
    {
        //dd($request->all(), $programa);
        $programa = Programa::all(); 
        return view('programa.programapdf', compact('programa'));   
    }

}
