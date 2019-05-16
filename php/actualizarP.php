<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$idf=$_POST['id'];
		$idc=$_POST['idc'];
		$d=$_POST['desc'];
		$p=$_POST['precio'];
		$i=$_POST['ima'];

		if(buscaRepetido($idf,$d,$conexion)==1){
			echo 2;
		}else{
			$sql="UPDATE productos SET idcategoria='$idc', descripcion='$d', precio='$p', imagen='$i' WHERE idproducto='$idf'";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($idf,$d,$conexion){
			$sql="SELECT * FROM productos
				WHERE idproducto='$idf'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				$sql="SELECT * FROM productos
				WHERE descripcion='$d' AND idproducto='$idf'";
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