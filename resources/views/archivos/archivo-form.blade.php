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
	
            <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                        Seleccione el archivo a cargar
                  </span>
                  <input type="file" name="archivo" id="archivo">
            </form>
            <hr>      
			  
            <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Cargar
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
			  </form>
		 </body>
	 </html>
	 
@endsection