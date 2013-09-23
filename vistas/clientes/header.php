<?php 
	require_once ('../../clases/sesion.php');
	$items=Sesion::retornarSesion('items');
	$total=number_format(Sesion::retornarSesion('total_compra'));
	if (!$items) $items="0";
	if (!$total) $total="0.00";
 ?>
 <table>
 	<tr>
 	  <td rowspan= 2>
  	     <a href = "index.php"><img src="../../imagenes/Book-O-Rama.gif" alt="Bookorama" border=0 align="left" valign="bottom" height = 60 width = 247></a>
      </td>

      <td align="right" valign="bottom">
	    <?php echo "Total Libros Comprados=". $items;?>
  	  </td>

  	  <td align ="right" rowspan="2" width = "135">
		<a href="ver_carrito.php?"><img src="../../imagenes/CARRITO_DE_COMPRAS.gif" width="135" border="0"/></a> 
 	 </td>
 	</tr>

 	<tr>
 		<td align ="right" valign="top">	
		  <?php echo "Total Compra ".$total."Bs";?>
        </td>
 	</tr>	

 </table>