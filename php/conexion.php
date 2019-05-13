<?php 
	function conexion(){
		return $conexion=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela") or die ("Error al acceder a la Base de Datos");
	}
 ?>