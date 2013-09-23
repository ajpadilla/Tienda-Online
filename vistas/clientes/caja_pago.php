<?php 
	require_once ('../../clases/sesion.php');
	require_once ('../../clases/factura.php');
	Sesion::iniciarSesion();
	$factura=new Factura();
	$libro=new Libro();
	$libros=Sesion::retornarSesion('carrito_libros');
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Pago Libros</title>
</head>
<body>
	<?php include('header.php') ?>
	<h2>Caja</h2>
	<?php if (isset($libros) && count($libros)>0): ?>
	  <table border = 0 width = 100% cellspacing = 0>
	  	<tr>
			 	<th colspan="2" bgcolor="#cccccc">Item</th>
				<th bgcolor="#cccccc">Precio</th>
				<th bgcolor="#cccccc">Cantidad</th>
				<th bgcolor="#cccccc">Total</th>
		</tr>
		<?php foreach ($libros as $isbn => $cantidad): ?>
		<?php $dato_libro= $libro->obtener_libro_isbn($isbn)?>
			<tr>
				<td align ="left"><?php echo $dato_libro[0]['titulo'];?></td>
			 	<td align="center" colspan="2"><?php echo number_format($dato_libro[0]['precio'],2); ?>Bs</td>
			 	<td align="center"><?php echo $cantidad; ?></td>
			 	<td align="center"><?php echo number_format($dato_libro[0]["precio"] * $cantidad,2);?>Bs</td>
			</tr>
		<?php endforeach ?>

			<tr>
				<td align="right" colspan="5" bgcolor="#cccccc"><?php echo 'Total a pagar:  '.number_format(Sesion::retornarSesion('total_compra')); ?>Bs</td>
			</tr>
	  </table >
	  	<br>
	  	<br>
	  <form name="form_datos_usuario" action="../../controladores/datos_usuario.php" method="POST">
	  	 <table border = 0 width = 40% cellspacing = 0>
	  		<tr>
	  			<th bgcolor="#cccccc">Datos Del Cliente</th>
	  		</tr>
	  		<tr>
	  			<td align ="left">Cedula<input type="text" name="cedula" value=""></td>
	  		</tr>
	  		<tr>
	  			<td align ="left">Nombre Y Apellido<input type="text" name="nombre" value=""></td>
	  		</tr>
	  		<tr>
	  			 <td align ="left">Direccion<input type="text" name="direccion" value=""></td>
	  		</tr>
	  		<tr>
	  			<td><input type="image" src="../../imagenes/purchase.gif" alt="Enviar formulario" title="Enviar" /></td>
	  		</tr>
	  		<tr>
	  			<td><a href='index.php'><img src="../../imagenes/continue-shopping.gif" border="0" title="Continuar Comprando"></a></td>
	  		</tr>
	    </table>
	  </form>
	 
	<?php else: ?>
		<?php  	echo "<p>No hay artículos en tu carro</p>"; ?>
	<?php endif ?>
</body>
</html>