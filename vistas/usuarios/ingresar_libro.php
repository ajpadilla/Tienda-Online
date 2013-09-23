<?php 
	require_once ('../../clases/sesion.php');
	require_once ('../../clases/categoria.php');
	Sesion::iniciarSesion();

	if (!Sesion::existe('sesion_usuario')) 
	{
		header('Location: /tienda_online/vistas/clientes/index.php');
	}

	$categoria=new Categoria();
	$categorias=$categoria->retornar_categorias();

 ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>A&ntilde;adir Libro</title>
</head>
<body>
	<h2>A&ntilde;adir Un Nuevo Libro</h2>

	<form id="form_libro" name="form_libro" method="POST" action="/tienda_online/controladores/agregar_libro.php">
		<table>
			<tr>
				<td>ISBN</td>
				<td><input type="text" id="isbn" name="isbn"></td>
			</tr>
			<tr>
				<td>AUTOR</td>
				<td><input type="text" id="autor" name="autor"></td>
			</tr>
			<tr>
				<td>TITULO</td>
				<td><input type="text" id="titulo" name="titulo"></td>
			</tr>
			<tr>
				<td>CATEGORIA</td>
				<td>
					<select id="cat_id" name="cat_id">
						<?php foreach ($categorias as  $categoria) 
						{
						?>
						<option value="<?php echo $categoria['id'];?>"> <?php echo $categoria['nombre'];?> </option>
						<?php
						} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>PRECIO</td>
				<td><input type="text" id="precio" name="precio"></td>
			</tr>
			<tr>
				<td>DESCRIPCION</td>
				<td><textarea id="descripcion" name="descripcion" rows="5" cols="40"></textarea></td>
			</tr>
			<tr><td><input type="submit" value="Agregar Libro"></td></tr>
		</table>
	</form>
	<a href="sesion.php">Volver al menu de Administracion</a>
</body>
</html>