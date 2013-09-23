<?php 
   require_once ('../../clases/libro.php');
   require_once ('../../clases/sesion.php');
   require_once ('../../clases/categoria.php');
   require_once ('../../clases/factura.php');
    Sesion::iniciarSesion();
    $obj_libro=new Libro();
    $factura=new Factura();

	if (isset($_GET['isbn'])) 
	{
		$isbn=$_GET['isbn'];

		if(!Sesion::existe('carrito_libros'))
		{
			$libros=array();
			Sesion::asignarSesion('carrito_libros',$libros);
			Sesion::asignarSesion('items',0);
			Sesion::asignarSesion('total_compra',0.00);
		}

		$libros=Sesion::retornarSesion('carrito_libros');

		if ($libros[$isbn]) 
		{
			$libros[$isbn]++;
			Sesion::asignarSesion('carrito_libros',$libros);
		}
		else
		{
			$libros[$isbn]=1;
			Sesion::asignarSesion('carrito_libros',$libros);
		}
		$sesion=Sesion::retornarSesion('carrito_libros');
        echo "carrito_libros:".$sesion[$isbn];
		Sesion::asignarSesion('items',$factura->calcular_items_carrito($sesion));
		Sesion::asignarSesion('total_compra',$factura->calcular_total_pagar($sesion));
	}

 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>
 <head>
 	<title>Carrito de Compras</title>
 </head>
 <body>
 	   <?php include('header.php') ?>

	 	<?php if (Sesion::existe('carrito_libros')): ?>
		<table  border = 0 width = 100% cellspacing = 0>
			 <tr>
			 	<th colspan="2" bgcolor="#cccccc">Item</th>
				<th bgcolor="#cccccc">Precio</th>
				<th bgcolor="#cccccc">Cantidad</th>
				<th bgcolor="#cccccc">Total</th>
				<th bgcolor="#cccccc">Borrar</th>
				<th bgcolor="#cccccc">Actualizar</th>
			 </tr>

			 <?php  $sesion_libro=Sesion::retornarSesion('carrito_libros')?>

			 <?php foreach ($sesion_libro as $isbn => $cant): ?>

			 <?php $dato_libro=$obj_libro->obtener_libro_isbn($isbn); ?>

			 	<form name="form_lista_compra" action="../../controladores/actualizar_carrito.php" method="POST">
			 		<tr>
			 			<td align ="left"><a href="detalles_libro.php?isbn=<?php echo $dato_libro[0]['isbn'];?>"><?php echo $dato_libro[0]['titulo'];?></a></td>
			 			<td align="center" colspan="2"><?php echo number_format($dato_libro[0]['precio'],2); ?>Bs</td>
			 			<td align ="center"><input type="text" name="cant_libros" size="3" value="<?php echo $cant; ?> " /> </td>
			 			<td align ="center"><?php echo number_format($dato_libro[0]["precio"] * $cant,2);?>Bs</td>
			 			<td align ="center">	
						  <a href="../../controladores/elimina_item.php?isbn=<?php echo $isbn;?>" title="elimina item"><img src="../../imagenes/trash.gif" width="20" height="20" border="0"/></a>
						</td>
						<td align = "center">
						<input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
						<input type="image" name="image" src="../../imagenes/actualizar.gif" />
						</td>	
			 		</tr>
			 	</form>

			 <?php endforeach ?>
		</table>
	<?php else: ?>
	<?php  	echo "<p>No hay artículos en tu carro</p>"; ?>
		<hr>
	<?php endif ?>
		<br>
		<br>
	<center>
		<a href='index.php'><img src="../../imagenes/continue-shopping.gif" border="0" title="Continuar Comprando"></a>
		<br>
		<a href="caja_pago.php"><img src="../../imagenes/place_order.gif" border="0" title="Hacer el Pedido"></a>
	</center>
 </body>
 </html>