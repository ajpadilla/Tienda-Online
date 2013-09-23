<?php 
	require_once ('../clases/sesion.php');
	require_once ('../clases/factura.php');
	Sesion::iniciarSesion();
	$factura=new Factura();

	if (isset($_GET)) 
	{
		if (array_key_exists('isbn',$_GET))
		{
			$isbn=$_GET['isbn'];
		}
	}

	$libros=Sesion::retornarSesion('carrito_libros');
	unset($libros[$isbn]);
	Sesion::asignarSesion('carrito_libros',$libros);

	$sesion=Sesion::retornarSesion('carrito_libros');
	Sesion::asignarSesion('items',$factura->calcular_items_carrito($sesion));
	Sesion::asignarSesion('total_compra',$factura->calcular_total_pagar($sesion));

	header("Location:../vistas/clientes/ver_carrito.php");
 ?>