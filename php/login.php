<?php

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){

		require 'connect.php';
		sleep(1);
		// Sesiones
		session_start();

		$mysqli->set_charset('utf8');

		$usuario = $mysqli->real_escape_string($_POST['email']);
		$pas = $mysqli->real_escape_string($_POST['pass']);

		if($nueva_consulta = $mysqli->prepare("SELECT nombre, email, tipo FROM usuarios WHERE email = ? AND password = ? ")){
			$nueva_consulta->bind_param('ss',$usuario,$pas);

			$nueva_consulta->execute();

			$resultado = $nueva_consulta->get_result();

			if($resultado->num_rows == 1){
				$datos = $resultado->fetch_assoc();
				$_SESSION['user'] = $datos;
				echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
			}
			else{
				echo json_encode(array('error'=>true));
			}
			$nueva_consulta->close();
		}

	}

	$mysqli->close();
?>