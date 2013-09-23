<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
	<title>Registra un Nuevo Usuario</title>		
</head>

<body>
	<div>
			<h2>Registrar Nuevo Usuario :</h2>
			<form id="frmNewUser" name="frmNewUser" method="POST" action="/tienda_online/controladores/registrar_usuario.php">
	 			<table>
		   			<tr>
		     			<td>Nombre Usuario</td>
		     			<td><input type=text id="usuario" name="usuario" size="16" maxlength="16"></td>
		     	    </tr>
		   			<tr>
		     			<td>Contrase&ntilde;a</td>
		     			<td><input type="password" id="pass" name="pass" size="16" maxlength="16"></td>
		     		</tr>
		     		<tr><td><input type="submit" value="Registrar"></td></tr>
	 			</table>
			</form>	
		</div>	
</body>

</html>