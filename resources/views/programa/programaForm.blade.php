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
			@if(isset($programa))
        <form action="{{ route('programa.update', $programa) }}" method="POST">
            @method('PATCH')
    @else
    <form action="{{ route('programa.store') }}" method="POST">
    @endif
			
			@csrf
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre del programa</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="programa" id="programa" value="{{ old('programa') ?? $programa->programa ?? '' }}">
				@error('programa')
					<span class="text-red-600">{{$message}}</span>
				@enderror
				</label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Calendario</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="calendario" id="calendario" value="{{ old('calendario') ?? $programa->calendario ?? ''}}">
				@error('calendario')
					<span class="text-red-600">{{$message}}</span>
				@enderror
			  </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Folio</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="folio" id="folio" value="{{ old('folio') ?? $programa->folio ?? ''}}">
				@error('folio')
					<span class="text-red-600">{{$message}}</span>
				@enderror
			  </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Titular</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="titular" id="titular" value="{{old('titular') ?? $programa->titular ?? ''}}">
				@error('titular')
					<span class="text-red-600">{{$message}}</span>
				@enderror
              </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Dependencia</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="dependencia" id="dependencia" value="{{old('dependencia') ?? $programa->dependencia ?? ''}}">
				@error('dependencia')
					<span class="text-red-600">{{$message}}</span>
				@enderror
			  </label>
			  <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Guardar
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
			  </form>
	 	
		 </body>
	 </html>
	 
@endsection