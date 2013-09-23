<?php 
   require_once '../clases/administrador.php';
   require_once '../clases/sesion.php';
   Sesion::iniciarSesion();
   if (!Sesion::existe('sesion_usuario')) 
   {
	  header('Location: /tienda_online/vistas/clientes/index.php');
   }

   if (isset($_POST)) 
   {
   	
   	 if (isset($_POST['usuario'])) 
   	 {
   	 	$nombre_usuario=$_POST['usuario'];
   	 }

   	 if (isset($_POST['pass'])) 
   	 {
   	 	$password=$_POST['pass'];
   	 }
   }

   //echo "Usuario:".$usuario." "."Password:".$password;
   $usuario=new Administrador();

   if ($usuario->verigficarNombreUsuario($nombre_usuario)) 
   {
	   	  echo "<script type='text/javascript'>
		  alert ('EL Nombre de Usuario ya Esta Ocupado. Intente con Otro Nombre.');
		  window.location='/tienda_online/vistas/usuarios/sesion.php';
		  </script>";
   }
   else
   {	
	   	if(!$usuario->agregarUsuario($nombre_usuario,$password))
	   	{
	   		echo "<script type='text/javascript'>
		   alert ('Nuevo Usuario ha Sido Registrado. Inicie Sesion.');
		   window.location='/tienda_online/vistas/usuarios/sesion.php';
		   </script>";
	   	}
   }

   	 
 ?>