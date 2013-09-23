<?php 
	require_once('../clases/sesion.php');
	require_once('../clases/administrador.php');
	Sesion::iniciarSesion();

	if (array_key_exists('usuario', $_POST)) 
	{
		$usuario=$_POST['usuario'];
	}

	if (array_key_exists('pass', $_POST)) 
	{
		$password=$_POST['pass'];
	}

	$administrador=new Administrador();
	//$administrador->get_conexio_db()->imprimir();
	//$administrador->iniciar_sesion_usuario($usuario,$password)
	if($administrador->iniciar_sesion_usuario($usuario,$password))
	{
		Sesion::asignarSesion('sesion_usuario',$usuario);
		echo "<script type='text/javascript'>
		alert ('Bienvenido');
		window.location='/tienda_online/vistas/usuarios/sesion.php';
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'>
		alert ('Usuario O Clave Incorrectos.');
		window.location='/tienda_online/vistas/clientes/index.php';
		</script>";
	}

	

 ?>