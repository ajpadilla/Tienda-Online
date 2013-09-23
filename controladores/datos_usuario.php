<?php 
	require_once ('../clases/sesion.php');
	require_once ('../clases/factura.php');
	Sesion::iniciarSesion();
	$factura=new Factura();

	if (isset($_POST)) 
	{
		if (array_key_exists('cedula', $_POST))
		{
			$cedula=$_POST['cedula'];
		}

		if (array_key_exists('nombre', $_POST))
		{
			$nombre=$_POST['nombre'];
		}

		if (array_key_exists('direccion', $_POST))
		{
			$direccion=$_POST['direccion'];
		}
	}

	if (Sesion::existe('carrito_libros') && Sesion::existe('items') && Sesion::existe('total_compra'))
    {
		if (!$factura->agregar_compra($cedula,$nombre,$direccion,Sesion::retornarSesion('total_compra'))) 
		{
			Sesion::destruirSesion();
			echo "<script type='text/javascript'>
			alert('Su Pedido Ha Sido Procesado con Exito, Haremos la Entrega de Su Pedido en las proximas 24 Horas.');
			window.location='../vistas/clientes/index.php';
			</script>";
		}else
		{
			Sesion::destruirSesion();
			echo "Pedido Fallido.";
		}
	}
	else
	{
		echo "<script type='text/javascript'>
		alert('No hay Articulos en el Carrito.');
		window.location='../vistas/clientes/index.php';
		</script>";
	}
 ?>