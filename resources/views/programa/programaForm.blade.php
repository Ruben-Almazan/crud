@extends('layouts.windmill')
@section('contenido')
    <!DOCTYPE html>
<html lang="es">
	
	<body>
	<br>
<a class="flex items-center center p-4 mb-8 text-sm font-family:verdana text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
              </div>
              <span style="width: 100%;text-align: center">
              
                            
        <FONT FACE="Arial" SIZE=4 COLOR="white">Formulario de solicitud de cabaña</FONT>
    </a>

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
                <span class="text-gray-700 dark:text-gray-400">Nombre del titular</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="nombre_titular" id="nombre_titular" value="{{ old('nombre_titular') ?? $programa->nombre_titular ?? ''}}">
				@error('nombre_titular')
					<span class="text-red-600">{{$message}}</span>
				@enderror
			  </label>

			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Cabaña a utilizar (Seleccione una opción)</span>
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
				name="cabana" id="cabana" value="{{ old('cabana') ?? $programa->cabana ?? ''}}">
     				<option value="Cabaña Chica">Cabaña Chica (4 personas)</option>
     				<option value="Cabaña Mediana">Cabaña Mediana (8 personas)</option>
					<option value="Cabaña Grande">Cabaña Family Size (Hasta 16 personas)</option>
				</select>
				@error('cabana')
					<span class="text-red-600">{{$message}}</span>
				@enderror
					
			  </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Telefono de contacto</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="text" name="telefono" id="telefono" value="{{ old('telefono') ?? $programa->telefono ?? ''}}">
				@error('telefono')
					<span class="text-red-600">{{$message}}</span>
				@enderror
			  </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Dias de hospedaje</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
				type="number" min="1" max="14" name="dias" id="dias" value="{{old('dias') ?? $programa->dias ?? ''}}">
				@error('dias')
					<span class="text-red-600">{{$message}}</span>
				@enderror
              </label>
			  <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Forma de pago (Seleccione una opción)</span>
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
				name="pago" id="pago" value="{{ old('pago') ?? $programa->pago ?? ''}}">
     				<option value="Efectivo">Efectivo</option>
     				<option value="Tarjeta de débito">Tarjeta de Débito</option>
					<option value="Tarjeta de credito">Tarjeta de Crédito</option>
				</select>
				@error('cabana')
					<span class="text-red-600">{{$message}}</span>
				@enderror
					
			  </label>
			  <br>
			  <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
            >
              <span class="ml-3" aria-hidden="true">Guardar</span>
            </button>
			
			  </form>
	 	
		 </body>
	 </html>
	 
@endsection