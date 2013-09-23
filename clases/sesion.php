<?php 
	class Sesion
	{
		public static function iniciarSesion()
		{
           session_start();
		}

		public static function asignarSesion($nombre_sesion='',$dato='')
		{
			$_SESSION[$nombre_sesion]=$dato;
		}

		public static function existe($nombre_sesion='')
		{
			if(array_key_exists($nombre_sesion,$_SESSION))
				return true;
			else
				return false;
		}

		public static function desregistrarSesion($nombre_sesion='')
		{
			session_unregister($nombre_sesion='');
		}

		public static function destruirSesion()
		{
			session_destroy();
		}

		public static function retornarSesion($nombre_sesion='')
		{
			return $_SESSION[$nombre_sesion];
		}

	}
 ?>