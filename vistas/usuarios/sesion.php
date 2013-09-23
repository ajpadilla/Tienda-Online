<?php 
	require_once('../../clases/sesion.php');
	Sesion::iniciarSesion();
	//echo "Bienvenido";
	if (Sesion::existe('sesion_usuario')) 
	{
		$usuario=Sesion::retornarSesion('sesion_usuario');
		//echo $usuario;
	}
	else
	{
		header('Location: /tienda_online/vistas/clientes/index.php');
	}

 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Carrito de Compras</title>
</head>
<body>
	   <h2>Bienvenido Administrador <?php echo $usuario;?></h2>
	   <br/>
	   <br/>
	   <a href="">Ir al sitio Principal</a><br/>
	   <a href="ingresar_categoria.php">A&ntilde;adir una nueva categoria</a><br/>
	   <a href="ingresar_libro.php">A&ntilde;adir un nuevo libro</a><br/>
	   <a href="cambiar_password">Cambiar contrase&ntilde;a</a><br/>
	   <a href="registrar_usuario.php">Agregar nuevo usuario administrador</a><br/>
</body>
</html>