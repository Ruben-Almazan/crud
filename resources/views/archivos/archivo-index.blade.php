@extends('layouts.windmill')
@section('contenido')
<br>
<a class="flex items-center center p-4 mb-8 text-sm font-family:verdana text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
              </div>
              <span style="width: 100%;text-align: center">
        <FONT FACE="Arial" SIZE=4 COLOR="white">Archivos del personal</FONT>
    </a>
    @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                        Seleccione los archivos a cargar
                  </span>
                  <br>
                  <input multiple type="file" name="archivo" id="archivo">
            </form>
            <hr>      
			  <br>
            <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
            >
              Cargar Archivos
              <span class="ml-3" aria-hidden="true">+</span>
            </button>
			  </form>
<br>
<!-- With actions -->

            <div style="width: 100%;text-align: center" class="w-full overflow-hidden rounded-lg shadow-xs">
              <div style="width: 100%;text-align: center" class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
					<th style="text-align: center" class="px-4 py-3">Nombre del archivo</th>
					<th style="text-align: center" class="px-4 py-3">Acciones</th>
					</tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  @foreach ($archivos as $archivo)
                    <tr style="text-align: center" class="text-gray-700 dark:text-gray-400">
                      <td style="text-align: center" class="px-4 py-3">
                        <div style="text-align: center" class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                           {{ $archivo->nombre_original }}
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
					  <a href="{{route('archivo.descargar', $archivo)}}"><p style="color: blue;">( Descargar )</p>  </a>
                      
                      <form action="{{ route('archivo.destroy', $archivo)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button >
                            <p style="color: red;"> <b> ( Eliminar ) </b></p>
                          </button>
                      </form>

                      <a href="{{route('archivo.edit', $archivo)}}"> <p style="color: green;">( Editar )</p> 
                      </form>
                      </td>
                    
                        </td>
                      </form>
                    </tr>
					@endforeach
					</tbody>
					</table>

   
@endsection