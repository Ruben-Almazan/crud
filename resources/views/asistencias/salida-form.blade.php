@extends('layouts.windmill')
@section('contenido')
<br>
<a class="flex items-center center p-4 mb-8 text-sm font-family:verdana text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
              </div>
              <span style="width: 100%;text-align: center">
              
                            
        <FONT FACE="Arial" SIZE=4 COLOR="white">Registro de salidas</FONT>
    </a>


<!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
					<th align="center", class="px-4 py-3">Prestador</th>
          <th align="center", class="px-4 py-3">Programa</th>
					<th align="center", class="px-4 py-3">Fecha</th>
					<th align="center", class="px-4 py-3">Entrada</th>
					<th align="center", class="px-4 py-3">Acciones</th>
					</tr>
                  </thead>
                  <tbody
                  align="center", class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  @foreach ($asistencias as $asistencia)
                    <tr align="center", class="text-gray-700 dark:text-gray-400">
                      <td align="center", class="px-4 py-3">
                        <div align="center", class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                           {{ $asistencia->prestador->nombre }}
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
					  {{ $asistencia->programa->nombre_titular }}
                      </td>
                      <td class="px-4 py-3 text-xs">
					  {{ $asistencia->fecha }}
                      </td>
                      <td class="px-4 py-3 text-sm">
					  {{ $asistencia->entrada }}
                      </td>
                      <td class="px-4 py-3">
                        
                        <form action="{{route('asistencia.registrarSalida', $asistencia)}}" method="POST">
                        @csrf
                        <div align="center", class="flex items-center space-x-4 text-sm">
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                              <FONT align=center FACE="Arial" SIZE=2 COLOR="red">Confirmar salida</FONT>
                          </button>
                          </form>
                        </div>
                      </td>
                    </tr>
					@endforeach
					</tbody>
					</table>
  
@endsection