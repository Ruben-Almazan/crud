@extends('layouts.windmill')
@section('contenido')
<br>
<a href="{{ route('programa.index') }}"> <-- Regresar a Mis Reservas</a>
<a class="flex items-center center p-4 mb-8 text-sm font-family:verdana text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
              <div class="flex items-center">
              </div>
              <span style="width: 100%;text-align: center">
              
                            
        <FONT FACE="Arial" SIZE=4 COLOR="white">Detalle de reservación</FONT>
    </a>
    </p>
    @if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
				<p style="width: 100%; text-align: center;"><b>Reserva #{{ $programa->id }}</b></p>
                </h4>
                <table border="1" style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Usuario</b></td>
                    <td style="width: 50%; text-align: center;">{{ $programa->user->name }}</td>
                    </tr>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Titular de la renta</b></td>
                    <td style="width: 50%; text-align: center;">{{ $programa->nombre_titular }}</td>
                    </tr>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Tipo de cabaña</b></td>
                    <td style="width: 50%; text-align: center;">{{ $programa->cabana }}</td>
                    </tr>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Teléfono</b></td>
                    <td style="width: 50%; text-align: center;">{{ $programa->telefono }}</td>
                    </tr>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Dias de estancia</b></td>
                    <td style="width: 50%; text-align: center;"> {{ $programa->dias }}</td>
                    </tr>
                    <tr>
                    <td style="width: 50%; text-align: center;"><b>Forma de pago</b></td>
                    <td style="width: 50%; text-align: center;">{{ $programa->pago }}</td>
                    </tr>
                    </tbody>
                    </table>
              </div>

              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                <p style="width: 100%; text-align: center;"><b>Personal asignado a la atención de Reserva #{{ $programa->id }}</b></p>
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  @foreach ($programa->prestadores as $prestador)
                    <p style="width: 100%; text-align: center;">{{$prestador->nombre}}</p>
                  @endforeach
                  
                </p>
                </div>
              </div>


            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Agregar Personal
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  <form action="{{route('programa.agrega-prestador', $programa)}}" method="POST">
                        @csrf 
                        <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Seleccione personal
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
              		class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
            >
              Actualizar Lista de Personal Asignado
              <span class="ml-3" aria-hidden="true"></span>
            </button>
             </form> 
             </div>
              
</div>


	<form action="{{ route('programa.destroy', $programa)}}"  method="POST">

		@csrf
		@method('DELETE')
		<button
    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
            >
              Eliminar
              <span class="ml-3" aria-hidden="true">-</span>
            </button>
		<br>
	 </form>

@can('delete', $programa)
@endcan
@endsection