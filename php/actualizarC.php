<?php

	require_once "conexion.php";
	$conexion=conexion();

		$idf=$_POST['id'];
		$nombre=$_POST['nombre'];
		$d=$_POST['desc'];
		$p=$_POST['precio'];

		if(buscaRepetido($idf,$nombre,$conexion)==1){
			echo 2;
		}else{
			$sql="UPDATE cursos SET nombrecurso='$nombre', descripcion='$d', precio='$p' WHERE idcurso='$idf'";
			echo $result=mysqli_query($conexion,$sql);
		}

		function buscaRepetido($idf,$nombre,$conexion){
			$sql="SELECT * FROM cursos
				WHERE nombrecurso='$nombre'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				$sql="SELECT * FROM cursos
				WHERE nombrecurso='$nombre' AND idcurso='$idf'";
				$result=mysqli_query($conexion,$sql);
				if(mysqli_num_rows($result) > 0){
					return 0;
				}
				else{
					return 1;
				}
			}
			else{
				return 0;
			}
		}
 ?>