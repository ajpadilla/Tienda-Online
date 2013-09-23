<?php 
	require_once ('conexion.php');
	class Libro
	{
		private $isbn;
		private $autor;
		private $titulo;
		private $id_categoria;
		private $precio;
		private $descripcion;
		private $datos_conexion;
		function __construct()
		{
		 	 $this->isbn=NULL;
			 $this->autor=NULL;
			 $this->titulo=NULL;
			 $this->id_categoria=NULL;
			 $this->precio=NULL;
		 	 $this->descripcion=NULL;
		 	 $datos_conexion= array('host'=>'localhost','usuario'=>'root','password'=>'Heme19234099','bd'=>'tienda_online');
			 $this->conexio_db=new Conexion($datos_conexion);
		}

		public function agregar($isbn,$autor,$titulo,$id_categoria,$precio,$descripcion)
		{
			$query="INSERT INTO libros (isbn,autor,titulo,id_categoria,precio,descripcion) VALUES ('$isbn','$autor','$titulo','$id_categoria','$precio','$descripcion')";
			$this->conexio_db->ejecutar_consulta($query);
		}

		public function verificar($isbn)
		{
			$query="SELECT isbn FROM libros WHERE isbn='$isbn'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);
			if($result!=NULL)
				return true;
			else
				return false;
		}

		public function obtener_libro_categoria($id)
		{
			$query="SELECT isbn,autor,titulo,id_categoria,precio,descripcion FROM libros WHERE id_categoria='$id'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);
			return $result;
		}

		public function obtener_libro_isbn($isbn)
		{
			$query="SELECT isbn,autor,titulo,id_categoria,precio,descripcion FROM libros WHERE isbn='$isbn'";
			$result=$this->conexio_db->obtener_resultados_cosulta($query);
			return $result;
		}

	}
 ?>