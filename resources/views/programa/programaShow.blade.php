@extends('layouts.windmill')
@section('contenido')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Detalle del Programa</h2>
<p>
        <a href="{{ route('programa.index') }}">Listado de programas</a>
    </p>
<div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
				<td>{{ $programa->programa }}</td>
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
					<ul>
						<li>Calendario: {{ $programa->calendario }}</li>
						<li>Folio: {{ $programa->folio }}</li>
						<li>Dependencia: {{ $programa->dependencia }}</li>
						<li>Titular: {{ $programa->titular  }}</li>
					</ul>
                </p>
              </div>
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Prestadores en el programa
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  @foreach ($programa->prestadores as $prestador)
                    <li>{{$prestador->nombre}}</li>
                  @endforeach
                  
                </p>
                </div>
              </div>


            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Agregar Prestadores
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  <form action="{{route('programa.agrega-prestador', $programa)}}" method="POST">
                        @csrf 
                        <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Seleccione prestador
                      </span>
                      <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      multiple
                      name="prestador_id[]">
                        @foreach($prestadores as $prestador)
                            <option value="{{ $prestador->id }}" {{array_search($prestador->id, $programa->prestadores->pluck('id')->toArray()) !== false ? 'selected' : ''}}>{{ $prestador->nombre }}</option>
                        @endforeach
                      </select>
                    </label>
                    <input type="hidden" name="programa_id" value="{{$programa->id}}">
                        
                      </p>
                <button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Actaualizar Prestador
              <span class="ml-3" aria-hidden="true">-</span>
            </button>
             </form> 
             </div>
              
</div>

@can('delete', $programa)
	<form action="{{ route('programa.destroy', $programa)}}"  method="POST">

		@csrf
		@method('DELETE')
		<button
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              Eliminar
              <span class="ml-3" aria-hidden="true">-</span>
            </button>
		<br>
	 </form>
@endcan

@endsection