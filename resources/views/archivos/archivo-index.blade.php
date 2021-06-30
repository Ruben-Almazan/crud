@extends('layouts.windmill')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Archivos</h2>

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

<!-- With actions -->
<h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Archivos
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
					<th class="px-4 py-3">Nombre del archivo</th>
					<th class="px-4 py-3">Acciones</th>
					</tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  @foreach ($archivos as $archivo)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                           {{ $archivo->nombre_original }}
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
					  <a href="{{route('archivo.descargar', $archivo)}}">Descargar</a>
                      </td>
                      
                    </tr>
					@endforeach
					</tbody>
					</table>

   
@endsection