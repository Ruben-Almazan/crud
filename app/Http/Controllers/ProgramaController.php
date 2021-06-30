<?php

namespace App\Http\Controllers;

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
            'titular' => ['required', 'string', 'min:5', 'max:255'],
            'programa' => ['required', 'string', 'min:5', 'max:255'],
            'dependencia' => ['required', 'string', 'max:255'],
            'folio' => ['required', 'integer', 'min:1'],
            'calendario' => ['required', 'string', 'min:4', 'max:6']       
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
        //Seguir utilizando $programas = Auth::user()->programas()->with('user')->get();
        $programas = Programa::with('user:id,name')->get();
        return view('programa.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-programas');
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
        /*$programa = new Programa();
        $programa->calendario = $request->calendario;
        $programa->folio = $request->folio;
        $programa->programa = $request->programa;
        $programa->dependencia = $request->dependencia;
        $programa->titular = $request->titular;        
        $programa->save();
        return redirect()->route('programa.index');*/
        Gate::authorize('admin-programas');
        $request->validate($this->rules);
        $request->merge(['user_id' => $request->user()->id]);
        Programa::create($request->all());
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
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
        //$this->authorize('update', $programa);
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
        if($request->user()->cannot('update', $programa)) {
            abort(403);
        }
        $request->validate($this->rules + ['folio' => [
            'required',
            'integer',
            Rule::unique('programa')->ignore($programa->id),
        ]]);
        $programa->calendario = $request->calendario;
        $programa->folio = $request->folio;
        $programa->programa = $request->programa;
        $programa->dependencia = $request->dependencia;
        $programa->titular = $request->titular;        
        $programa->save();
        return redirect()->route('programa.show', $programa);
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
        return redirect()->route('programa.index');
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
}
