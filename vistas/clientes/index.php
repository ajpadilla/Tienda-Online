<?php 
	require_once ('../../clases/sesion.php');
	require_once ('../../clases/categoria.php');
	Sesion::iniciarSesion();
	//Sesion::asignarSesion('sesion_cliente','cliente');

	$categoria=new Categoria();

	$array_categorias=$categoria->retornar_categorias();

 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Carrito de Compras</title>
	</head>
	<body>
		<?php include('header.php'); ?>
		<h2>Bienvenido a la Librería Online</h2>
		<a href="../usuarios/ingresar.php">Ingresar Como Administrador</a>
        <p>Categorias de libros:</p>
        <?php foreach ($array_categorias as $categoria): ?>
        	<?php $url="libro_categoria.php?id_categoria=".$categoria['id']; ?>
        	<a href="<?php echo $url;?>"><?php echo $categoria['nombre']; ?></a><br>
        <?php endforeach ?>
        <?php 
        	if (!isset($array_categorias)) 
        	{
        		echo "No hay Categorias actualmente disponibles<br>";
				exit();
        	}
         ?>
	</body>
</html>