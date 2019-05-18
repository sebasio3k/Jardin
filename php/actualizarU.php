<?php

	require_once "conexion.php";
	$conexion=conexion();

		$idf=$_POST['id'];
		$nombre=$_POST['nombre'];
		$ap=$_POST['ap'];
		$am=$_POST['am'];
		$sex=$_POST['sex'];
		$tel=$_POST['phone'];
		$usuario=$_POST['usuario'];
        $password=$_POST['password'];
        $tipo=$_POST['tipo'];

		if(buscaRepetido($idf,$usuario,$conexion)==1){
			echo 2;
		}else{
			$sql="UPDATE usuarios SET nombre='$nombre', apaterno='$ap', amaterno='$am', sexo='$sex', telefono='$tel', email='$usuario', password='$password', tipo='$tipo' WHERE idusuario='$idf'";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($idf,$user,$conexion){
			$sql="SELECT * FROM usuarios
				WHERE email='$user'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				$sql="SELECT * FROM usuarios
				WHERE email='$user' AND idusuario='$idf'";
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