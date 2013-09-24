<?php 
	//clase que representa los objetos categoria libros de la tienda_online
	require_once ('conexion.php');
	class Categoria
	{
		private $id;
		private $nombre_categoria;
		private $conexio_db;
		private $datos_conexion;
		public function __construct()
		{
			$this->id=NULL;
			$this->nombre_categoria=NULL;
			$datos_conexion= array('host'=>'localhost','usuario'=>'root','password'=>'Heme19234099','bd'=>'tienda_online');
			$this->conexio_db=new Conexion($datos_conexion);
		}

		public function agregar($nombre_categoria)
		{
			   $query="INSERT INTO categorias (nombre) VALUES ('$nombre_categoria')";
			   $this->conexio_db->ejecutar_consulta($query);
		}

		public function verificar($nombre_categoria)
		{
			$query="SELECT nombre FROM categorias WHERE nombre='$nombre_categoria'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);	
			if($result!=NULL)
				return true;
			else
				return false;
		}

		public function retornar_nombre($id_categoria)
		{
			$query="SELECT nombre FROM categorias WHERE id='$id_categoria'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);	
			return $result;
		}

		public function retornar_categorias()
		{
			$query="SELECT id,nombre FROM categorias";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);	
			return $result;
		}

	}
 ?>