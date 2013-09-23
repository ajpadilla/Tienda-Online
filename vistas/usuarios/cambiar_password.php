<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Cambiar Contrase&ntilde;a</title>
</head>
<body>
	<form id="form_cambiar_password" name="form_cambiar_password" method="POST" action="/tienda_online/controladores/cambiar_password.php">
		<table>
			<tr>
				<td>Nombre Usuario</td>
				<td><input type="text" id="usuario" name="usuario"></td>
			</tr>
			<tr>
				<td>Contrase&ntilde;a</td>
				<td><input type="password" id="old_pass" name="old_pass"></td>
			</tr>
			<tr>
				<td>Nueva Contrase&ntilde;a</td>
				<td><input type="password" id="new_pass" name="new_pass"></td>
			</tr>
			<tr>
				<td>Repetir Nueva Contrase&ntilde;a</td>
				<td><input type="password" id="new_pass2" name="new_pass2"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Cambiar Contrase&ntilde;a"></td>
			</tr>
		</table>
	</form>
</body>
</html>