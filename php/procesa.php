<?php
	// require_once "conexion.php";
	// $conexion=conexion();

	// $nombre=$_POST['nombre'];
	// $ap=$_POST['ap'];
	// $am=$_POST['am'];
	// $sex=$_POST['sexo'];
	// $tel=$_POST['phone'];
	// $usuario=$_POST['email'];
	// $password=$_POST['passv'];

	$recaptcha =  $_POST['g-recaptcha-response'];
	print($recaptcha);
	if($recaptcha != ''){ //SI CAPTCHA ESTA VACIO
		$secret = "6LcMBaQUAAAAAFLGSUKq8dX3YfLQYlNo4PKhDw7B"; //CLAVE SECRETA DE CAPTCHA
		$ip = $_SERVER ['REMOTE_ADDR']; //IP REMOTA
		$var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
		$array = json_decode($var, true); //en formato JSON
		if($array['success']){

			echo "<script>
                 alert('Captcha Confirmado')
                   </script>";
		// 	require_once "conexion.php";
		// 	$conexion=conexion();

		// 	$nombre=$_POST['nombre'];
		// 	$ap=$_POST['ap'];
		// 	$am=$_POST['am'];
		// 	$sex=$_POST['sex'];
		// 	$tel=$_POST['phone'];
		// 	$usuario=$_POST['usuario'];
		// 	$password=$_POST['password'];

			// if(buscaRepetido($usuario,$conexion)==1){
			// 	// echo 2;
			// 	echo "<script>
      //           		alert('Este usuario ya existe, prueba con otro :)');
    	// 	  		  </script>";
				
			// }else{
			// 	$sql="INSERT into usuarios (nombre,apaterno,amaterno,sexo,telefono,email,password,tipo)
			// 			values ('$nombre','$ap','$am','$sex','$tel','$usuario','$password','Usuario')";
			// 	mysqli_query($conexion,$sql);
			// 	// echo $result=mysqli_query($conexion,$sql);
			// 	echo "<script>
			// 	$('#formRegistro')[0].reset();
			// 	alertify.confirm('Mensaje', 'Usuario Registrado con exito',
			// 	function(){
			// 		alertify.success('IniciarSesion');
			// 		location.href='7_login_signin.php';
			// 	},
			// 	function(){
			// 		alertify.error('Cancel');
			// 	});	
			// 	</script>";
			// }


			// function buscaRepetido($user,$conexion){
			// 	$sql="SELECT * from usuarios 
			// 		where email='$user'";
			// 	$result=mysqli_query($conexion,$sql);

			// 	if(mysqli_num_rows($result) > 0){
			// 		return 1;
			// 	}else{
			// 		return 0;
			// 	}
			// }

			// true
			// echo "<script>
            //     alert('Registro con exito');
            //     window.location=document.referrer;
            //       </script>";

			// header("Location:".$_SERVER['HTTP_REFERER']);

		}
		else{
			echo "<script>
                alert('Eres un robot?')
    		  </script>";
		}
	}else{
		// echo 2;
		// echo "<script>";
		// echo "alerta(2)";
		// echo "</script>;";
		 echo "<script>
		 alert('Captcha SIN VERIFICAR');
	   </script>";
		//  "<script>
		//  			alertify.alert('Alerta', 'Captcha sin confirmar',
		//  			function(){
		// 	 			alertify.error('Verifica Captcha');
		//  			});
		// 	</script>";

	}
?>