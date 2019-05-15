<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$ap=$_POST['ap'];
		$am=$_POST['am'];
		$sex=$_POST['sex'];
		$tel=$_POST['phone'];
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];

		if(buscaRepetido($usuario,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre,apaterno,amaterno,sexo,telefono,email,password,tipo)
				values ('$nombre','$ap','$am','$sex','$tel','$usuario','$password','Usuario')";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$conexion){
			$sql="SELECT * from usuarios 
				where email='$user'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>