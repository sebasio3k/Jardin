<?php
	function conecta(){
		return $mysqli= new mysqli("localhost","Sebastian","ifuseekamy","jardinabuela");
		// or die ("Error al acceder a la Base de Datos");
	}
 ?>