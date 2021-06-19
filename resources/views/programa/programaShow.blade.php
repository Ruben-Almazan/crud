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
            </div>
   

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

@endsection