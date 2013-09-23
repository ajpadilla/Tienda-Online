<?php 
	require_once ('../../clases/sesion.php');
	require_once ('../../clases/libro.php');
	require_once ('../../clases/categoria.php');
	Sesion::iniciarSesion();

	if (isset($_GET['id_categoria']))
	 {
		$id=$_GET['id_categoria'];
		//echo "id_categoria:".$id;
	}
	$categoria=new Categoria();
	$libro=new Libro();
	$array_libro=$libro->obtener_libro_categoria($id);
	$nombre_categoria=$categoria->retornar_nombre($id);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>
 <head>
 	<title>Carrito de Compras</title>
 </head>
 <body>
 		<h2><?php echo $nombre_categoria[0]['nombre'];?></h2>
 		<?php if (is_array($array_libro) && count($array_libro)>0): ?>
 		<table width ="100%">
 			<?php foreach ($array_libro as  $dato_libro): ?>
 				<?php $url="detalles_libro.php?isbn=".$dato_libro['isbn']; ?>
 				<tr>
 					<td><a href="<?php echo $url; ?>"><?php echo $dato_libro['titulo']; ?></a></td>
 				</tr>
 			<?php endforeach ?>
 		<?php else: ?>
 			<?php
 				 echo "<strong>No Hay Libros para esta categoria.</strong><br><br>";
				 echo "<a href='index.php'>Regresar</a>";
				exit();
 			 ?>
 		<?php endif ?>
 		</table>
 </body>
 </html>