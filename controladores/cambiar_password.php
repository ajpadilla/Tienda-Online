<?php 
    require_once('../clases/sesion.php');
    require_once('../clases/administrador.php');
    Sesion::iniciarSesion();

	if (Sesion::existe('sesion_usuario')) 
	{
		$usuario_actual=Sesion::retornarSesion('sesion_usuario');
	}
	else
	{
		header('Location: /tienda_online/vistas/clientes/index.php');
	}

	if (array_key_exists('usuario',$_POST))
	{
		$usuario=$_POST['usuario'];
	}

	if (array_key_exists('old_pass', $_POST))
	{
		$old_pass=$_POST['old_pass'];
	}

	if (array_key_exists('new_pass', $_POST))
	{
		$new_pass=$_POST['new_pass'];
	}

	if (array_key_exists('new_pass2', $_POST))
	{
		$new_pass2=$_POST['new_pass2'];
	}

	$administrador=new Administrador();

	 if ($usuario_actual==$usuario)
	 {
		if(!$administrador->cambiar_password($usuario,$old_pass,$new_pass))
		{
			echo "<script type='text/javascript'>
			alert ('Contraseña Cambiada');
			window.location='/tienda_online/vistas/usuarios/sesion.php';
			</script>";
		}
		else
		{
			echo "<script type='text/javascript'>
			alert ('No Se Pudo Cambiar La Contraseña, Usuario O Clave Incorrecta');
			window.location='/tienda_online/vistas/usuarios/sesion.php';
			</script>";
		}
	 }
	 else
	 {
	 	echo "<script type='text/javascript'>
		alert ('Usuario Incorrecto, No Tiene Permiso Para Cambiar El Passwod Del Usuario');
		window.location='/tienda_online/vistas/usuarios/sesion.php';
		</script>";
	 }
 ?>