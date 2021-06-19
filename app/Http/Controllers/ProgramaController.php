<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    private $rules;

    public function __construct()
    {
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
        $programas = Programa::all();
        return view('programa.programaIndex', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        
        $request->validate($this->rules);
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
        return view('programa.programaShow', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
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
}
