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
              
                            
        <FONT FACE="Arial" SIZE=4 COLOR="white">Editar archivo</FONT>
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
	
            <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                        Seleccione el archivo a cargar
                  </span>
                  <input multiple type="file" name="archivo" id="archivo">
            </form>
            <hr>      
			  <br>
            <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
            >
              Cargar nuevo archivo
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
			  </form>
		 </body>
	 </html>
	 
@endsection