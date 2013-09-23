<?php 
	class Conexion
	{
		private $conexion;
		private $host;
		private $usuario;
		private $password;
		private $bd;
		private $bdSeleccionada;

	    public function __construct($database)
		{
	   		$this->host=$database['host'];
			$this->usuario=$database['usuario'];
			$this->password=$database['password'];
			$this->bd=$database['bd'];
	    	$this->bdSeleccionada='';
		}

		public function abrir_conexion()
		{
			$this->conexion=new mysqli($this->host,$this->usuario,$this->password,$this->bd);

			 if($this->conexion->connect_errno)
	    	 {
	              printf("Error al conectarse al servidor: %s\n",$this->conexion->connect_error);
	              exit();
	         }
		}

		public function cerrar_conexion()
	   	{
	   		$this->conexion->close();
	   	}

	   	public function ejecutar_consulta($query)
	   	{	   		
	   			$this->abrir_conexion();
	   			if(!$result=$this->conexion->query($query))
	   			   return false;
	   			else
	   				return true;

	   			$this->cerrar_conexion();
	   	}

	   	public function obtener_resultados_cosulta($query)
	   	{
	   		$array_datos=array();
	   		$this->abrir_conexion();
	   		if ($result=$this->conexion->query($query)) 
	   		{
	   			while ($dato=$result->fetch_assoc())
	   			{
	   				$array_datos[]=$dato;
	   			}
	   		  $result->close();
	   		  return $array_datos;
	   		}
   		    echo "No se pudo realizar la consulta";
   		    return NULL;
	   		$this->cerrar_conexion();
	   	}

	   	public function imprimir()
	   	{
	   		echo "host:".$this->host." "."usuario:".$this->usuario." "."password:".$this->password." "."bd:".$this->bd;
	   	}
	}

 ?>