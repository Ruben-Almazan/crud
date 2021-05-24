<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ejemplo D13</title>
	</head>
	<body>
	 <h1>Formulario Tareas</h1>
	 <form action="{{ route('tarea.store') }}" method="POST">
		@csrf
		<label for="titulo">Titulo:</label>	 
		<input type="text" name="titulo">
		<br>
		<label for="descripcion">Descripcion:</label>	 
		<textarea name="descripcion" cols="30" rows="5"></textarea>
		<br>
		<label for="tipo">Tipo:</label>	 
		<select name="tipo" id="tipo">
			<option value="Escuela">Escuela</option>
			<option value="Trabajo">Trabajo</option>
			<option value="Personal">Personal</option>
		</select>
		<br>
		<label for="fecha_limite">Fecha Limite:</label>	 
		<input type="date" name="fecha_limite">
		<br>
		<input type="submit" name="Crear">
		<br>
	 </form>
	 	
	</body>
</html>