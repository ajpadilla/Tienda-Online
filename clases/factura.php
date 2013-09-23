<?php 
    require_once ('libro.php');
	class Factura 
	{
		private $datos_conexion;
		private $conexio_db;
		private $libro;
		public function __construct()
		{
			$this->datos_conexion= array('host'=>'localhost','usuario'=>'root','password'=>'Heme19234099','bd'=>'tienda_online');
		    $this->conexio_db=new Conexion($this->datos_conexion);
		    $this->libro=new Libro();
		}

		public function agregar_compra($cedula_cliente,$nombre_cliente,$direccion_cliente,$total_pagar)
		{
           $query="INSERT INTO facturas (cedula_cliente,nombre_cliente,direccion_cliente,fecha_compra,total_pagar) 
					VALUES ('$cedula_cliente','$nombre_cliente','$direccion_cliente',now(),'$total_pagar')";
		   //echo $query;
		   $this->conexio_db->ejecutar_consulta($query);
		}

		public function calcular_items_carrito($carrito_libros)
		{
			$items=0;

			if (is_array($carrito_libros)) 
			{
				$items=array_sum($carrito_libros);
			}
			return $items;
		}

		public function calcular_total_pagar($carrito_libros)
		{
			$total_pagar=0;

			if (is_array($carrito_libros)) 
			{
				foreach ($carrito_libros as $isbn => $cantidad)
				 {
					$dato_libro=$this->libro->obtener_libro_isbn($isbn);
					if ($dato_libro!=NULL) 
					{
						$total_pagar+=$dato_libro[0]['precio']*$cantidad;
					}
				 }
			}
			return $total_pagar;
		}
	}
 ?>