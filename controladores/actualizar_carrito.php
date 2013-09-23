<?php 
	require_once ('../clases/sesion.php');
	require_once ('../clases/factura.php');
	Sesion::iniciarSesion();
	$factura=new Factura();


	if (isset($_POST)) 
	{
		if (array_key_exists('isbn',$_POST)) 
		{
			$isbn=$_POST['isbn'];
		}
		if (array_key_exists('cant_libros',$_POST)) 
		{
			$cantidad=$_POST['cant_libros'];
		}

		if (!isset($cantidad) || $cantidad==0) 
		{
			$cantidad=1;
		}

		$libros=Sesion::retornarSesion('carrito_libros');
		$libros[$isbn]=$cantidad;
		Sesion::asignarSesion('carrito_libros',$libros);

		$sesion=Sesion::retornarSesion('carrito_libros');
		Sesion::asignarSesion('items',$factura->calcular_items_carrito($sesion));
		Sesion::asignarSesion('total_compra',$factura->calcular_total_pagar($sesion));

	}
	header("Location:../vistas/clientes/ver_carrito.php");
 ?>