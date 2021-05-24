<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Ejemplo D13</title>
	</head>
	<body>
	 <h1>Listado Tareas</h1>
	 
	 <table border='1'>
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Descripcion</th>
				<th>Fecha Limite</th>
				<th>Tipo</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach ($tareas as $tarea)
				<tr>	
					<td>
						<a href="{{ route('tarea.show', $tarea) }}">
							{{ $tarea->titulo }}
						</a>
					</td>
					<td>{{ $tarea->descripcion }}</td>
					<td>{{ $tarea->fecha_limite }}</td>
					<td>{{ $tarea->tipo  }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
	
	</body>
</html>