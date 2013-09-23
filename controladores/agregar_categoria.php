<?php 
	require_once ('../clases/sesion.php');
	require_once ('../clases/categoria.php');
	Sesion::iniciarSesion();

	if (!Sesion::existe('sesion_usuario')) 
	{
		header('Location: /tienda_online/vistas/clientes/index.php');
	}

	if (array_key_exists('categoria', $_POST)) 
	{
		$nombre_categoria=$_POST['categoria'];
	}

	$categoria=new Categoria();

    if(!$categoria->verificar($nombre_categoria))
    {
    	if (!$categoria->agregar($nombre_categoria))
    	 {
    		echo "<script type='text/javascript'>
		    alert ('Categoria Agregada');
		    window.location='/tienda_online/vistas/usuarios/sesion.php';
		    </script>";
    	 }
    	
    }
    else
    {
    	echo "<script type='text/javascript'>
		alert ('La Categoria Ya Existe');
		window.location='/tienda_online/vistas/usuarios/sesion.php';
		</script>";
    }
 ?>