<?php 
	//clase que controla la administracion de la tienda online 
	require_once ('conexion.php');
	class Administrador
	{
		private $nombre_usuario;
		private $password;
		private $datos_conexion;
		private $conexio_db;
		public function __construct()
		{
			$this->nombre_usuario='';
			$this->password='';
			$datos_conexion= array('host'=>'localhost','usuario'=>'root','password'=>'Heme19234099','bd'=>'tienda_online');
			$this->conexio_db=new Conexion($datos_conexion);
		}

		public function agregarUsuario($usuario,$password)
		{
			$query="INSERT INTO administrador (user_name,password) VALUES ('$usuario','$password')";
			$this->conexio_db->ejecutar_consulta($query);
		}

		public function iniciar_sesion_usuario($usuario,$password)
		{
			$query="SELECT user_name ,password FROM administrador WHERE user_name='$usuario' AND password='$password'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);	
			if($result!=NULL)
				return true;
			else
				return false;
		}

		public function cambiar_password($usuario,$password,$nuevo_password)
		{
			$query="UPDATE administrador SET password='$nuevo_password' WHERE user_name='$usuario' AND password='$password'";
			$this->conexio_db->ejecutar_consulta($query);
		}

		public function verigficarNombreUsuario($nombre_usuario)
		{
		  $query="SELECT user_name FROM administrador WHERE user_name='$nombre_usuario'";
		  $result=$this->conexio_db->obtener_resultados_cosulta($query);	
			if($result!=NULL)
				return true;
			else
				return false;
		}

		public function set_nombre_usuario($nombre)
		{
			$this->nombre_usuario=$nombre;
		}

		public function set_password($pass)
		{
			$this->password=$pass;
		}

		public function get_nombre_usuario()
		{
			return $this->nombre_usuario;
		}

		public function get_password()
		{
			return $this->password;
		}

		public function get_conexio_db()
		{
			return $this->conexio_db;
		}
	}
 ?>