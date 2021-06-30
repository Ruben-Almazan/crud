@extends('layouts.windmill')
@section('contenido')
    <!DOCTYPE html>
<html lang="es">
	
	<body>
	<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Formulario de Programas</h2>

	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<br>
	</div>
	@endif
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
	
            @if(empty($programa_id))
    <form action="{{ route('asistencia.formEntrada') }}" method="GET">
            <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Seleccione programa
                      </span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="programa_id">
                      <option value="">---</option>
                        @foreach($programas as $programa)
                            <option value="{{ $programa->id }}">{{ $programa->programa }}</option>
                        @endforeach
                      </select>
                    </label>
                    <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Seleciconar programa
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
                    </form>
            <hr>

@endif
            
            @if(!empty($programa_id))
            
            <form action="{{ route('asistencia.registrarEntrada') }}" method="POST">
            @csrf
            <input type="hidden" name="programa_id" value="{{$programa_id}}">
            <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Seleccione prestador
                      </span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="prestador_id"
                      >
                        @foreach($prestadores as $prestador)
                            <option value="{{ $prestador->id }}">{{ $prestador->nombre }}</option>
                        @endforeach
                      </select>
                    </label>
       
			  
			  <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Registrar Entrada
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
			  </form>
	 	 @endif
		 </body>
	 </html>
	 
@endsection