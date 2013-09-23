<?php 
	require_once ('../../clases/sesion.php');
	require_once ('../../clases/libro.php');
	require_once ('../../clases/categoria.php');
	Sesion::iniciarSesion();

	if (isset($_GET['isbn']))
	 {
		$isbn=$_GET['isbn'];
		//echo $isbn;
	 }

	 $libro=new Libro();
	 $datos_libro=$libro->obtener_libro_isbn($isbn);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>
 <head>
 	<title>Carrito de Compras</title>
 </head>
 <body>
 	 <h2><?php echo $datos_libro[0]['titulo']; ?></h2>
 	 <?php if (condition): ?>
 	 	 <table>
 	 		<td>
 	 			<ul>
 	 				<li><b>Autor:</b> <?php echo $datos_libro[0]['autor'];?> 
					<li><b>ISBN:</b> <?php echo $datos_libro[0]['isbn'];?>
					<li><b>Nuestro Precio:</b> <?php echo $datos_libro[0]['precio'];?>
					<li><b>Descripcion:</b> <?php echo $datos_libro[0]['descripcion'];?>
 	 			</ul>
 	 		</td>
 	 	</table>
 	 <?php else: ?>
 	 	 echo "Los detalles de este libro no pueden ser mostrados en este momento.";
         echo "<hr>"; 
 	 <?php endif ?>
 	 <a href="ver_carrito?isbn=<?php echo $datos_libro[0]['isbn'];?>"><img src="../../imagenes/add-to-cart.gif"></a>
 </body>
 </html>

