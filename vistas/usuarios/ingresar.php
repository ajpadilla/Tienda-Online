<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Sesion Administrador</title>
</head>
<body>
	<div>
		<form id="form_usuario" name="form_usuario" method="POST" action="/tienda_online/controladores/ingresar_usuario.php">
			<table>
				<tr>
					<td>Administrador</td>
				</tr>
				<tr>
					<td>Nombre Usuario</td>
					<td><input type="text" id="usuario" name="usuario"></td>
				</tr>
				<tr>
					<td>Constrase&ntilde;a</td>
					<td><input type="password" id="pass" name="pass"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Ingresar"></td>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html>