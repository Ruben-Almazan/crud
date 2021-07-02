@extends('layouts.windmill')
@section('contenido')
<br>
<a class="flex items-center center p-4 mb-8 text-sm font-family:verdana text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
              </div>
              <span style="width: 100%;text-align: center">
              
                            
        <FONT FACE="Arial" SIZE=4 COLOR="white">Mis reservas</FONT>
    </a>

<div >
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-900 focus:outline-none focus:shadow-outline-purple" href="{{ route('programa.create') }}">
        Solicitar cabaña
    </a>
</div>   

<br>

@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<br>
<!-- With actions -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-black-700 bg-green-50 dark:text-gray-400 dark:bg-green-700"
                    >
					<th align="center", class="px-4 py-3">Folio</th>
					<th align="center", class="px-4 py-3">Usuario</th>
          <th align="center", class="px-4 py-3">Nombre del Titular</th>
					<th align="center", class="px-4 py-3">Cabaña</th>
					<th align="center", class="px-4 py-3">Telefono</th>
					<th align="center", class="px-4 py-3">Dias de estancia</th>
          <th align="center", class="px-4 py-3">Forma de pagos</th>
					<th align="center", class="px-4 py-3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
				  @foreach ($programas as $programa)
                    <tr align="center", class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm ">
                          <!-- Avatar with inset shadow -->
                           <a href=" {{route('programa.show', $programa->id)}} "><p style="color: blue;"> <b>{{ $programa->id }}</b></p></a>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
            {{ $programa->user->name }}
                      </td>
                      <td class="px-4 py-3 text-sm">
            {{ $programa->nombre_titular }}
                      </td>
                      <td class="px-4 py-3 text-xs">
					  {{ $programa->cabana }}
                      </td>
                      <td class="px-4 py-3 text-sm">
					  {{ $programa->telefono }}
                      </td>
                      <td class="px-4 py-3 text-sm">
					  {{ $programa->dias }}
                      </td>
					  <td class="px-4 py-3 text-sm">
					  {{ $programa->pago }}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                        
                        @can('update', $programa)
                          <a
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-2 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
							            href=" {{route('programa.edit', $programa)}} "
                          >
                          <p style="color: green;"> <b>Editar</b></p>
                          </a>
                          @endcan
                        <form action="{{ route('programa.destroy', $programa)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button >
                            <p style="color: red;"> <b>X</b></p>
                          </button>
                        <br>
                      </form>
        
                      
                        </div>
                      </td>
                    </tr>
					@endforeach
					</tbody>
					</table>

   
@endsection