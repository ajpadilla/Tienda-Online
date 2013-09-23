<?php 
	require_once ('../clases/sesion.php');
	require_once ('../clases/libro.php');
	Sesion::iniciarSesion();

	if (!Sesion::existe('sesion_usuario')) 
	{
		header('Location: /tienda_online/vistas/clientes/index.php');
	}

	$datos_libro=array();

	if (array_key_exists('isbn', $_POST)) 
	{
		$isbn=$_POST['isbn'];
	}

	if (array_key_exists('autor', $_POST)) 
	{
		$autor=$_POST['autor'];
	}

	if (array_key_exists('titulo', $_POST)) 
	{
		$titulo=$_POST['titulo'];
	}

	if (array_key_exists('cat_id', $_POST)) 
	{
		$categoria=$_POST['cat_id'];
		//echo 'id_cat:'.$categoria;
	}

	if (array_key_exists('precio', $_POST)) 
	{
		$precio=$_POST['precio'];
	}

	if (array_key_exists('descripcion', $_POST)) 
	{
		$descripcion=$_POST['descripcion'];
	}

	$libro=new Libro();

	if (!$libro->verificar($isbn)) 
	{
		if (!$libro->agregar($isbn,$autor,$titulo,$categoria,$precio,$descripcion)) 
		{
			echo "<script type='text/javascript'>
		    alert ('Libro Agregado');
		    window.location='/tienda_online/vistas/usuarios/sesion.php';
		    </script>";
		}
	} 
	else
	{
		echo "<script type='text/javascript'>
		alert ('El ISBN Del Libro Ya Existe ');
		window.location='/tienda_online/vistas/usuarios/sesion.php';
		</script>";
	}
	


 ?>