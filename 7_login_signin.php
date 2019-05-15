<?php
	// Sesiones
	session_start();
	// si existe la variable de sesiones
	if(isset($_SESSION['user'])) {
		// que tipo se usuario ingresa para redireccionar
		if($_SESSION['user']['tipo'] == "Admin"){
			header('Location: 13_admin_index.php');
		}
		else if($_SESSION['user']['tipo'] == "User"){
				header('Location: 2_index_2.php');
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Signin</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Alertify -->
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/themes/default.css">
	<script src="./alertifyjs/alertify.js"></script>
	<!-- /Bootstrap -->
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
	<!-- ICONO EN LA PESTAÑA -->
	<link rel="shortcur icon" href=".\img\icon.png">

</head>	
<body class="mibody">
	<!-- HEADER -->
	<header class="container-fluid">
		<div class="container-fluid justify-content-center">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<a class="navbar-brand" href="1_index.html">
					<!-- logo -->
					<img src=".\img\logo.png" class="img-fluid" alt="Responsive image" width="60" height="60">El Jard&iacute;n de la Abuela
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse" id="navbarColor01" style="">
					<ul class="navbar-nav mr-auto">
						<!-- Opciones -->
						<li class="nav-item ">
							<a class="nav-link" href="1_index.html">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="3_nosotros.html">Sobre Nosotros</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"href="4_productos.html">Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="5_cursos.html">Cursos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="3_nosotros.html">Contacto</a>
						</li>
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda" onBlur=foco();>
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
				</div>
			</nav>
		</div>
		<!-- CONTENEDOR PARA MOSTRAR RESULTADO DE BUSQUEDA -->
		<div class="container">
			<div class="search" id="search">
				<table class="search-table" id="searchTable" name="searchTable">
					<thead>
						<tr>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="1_index.html">Inicio</a></td>
						</tr>
						<tr>
							<td><a href="5_cursos.html">Cursos</a></td></a>
						</tr>
						<tr>
							<td><a href="3_nosotros.html">Empresa</a></td>
						</tr>
						<tr>
							<td><a href="3_nosotros.html">Contacto</a></td>
						</tr>
						<tr>
							<td><a href="1_index.html">Jardin</a></td>
						</tr>
						<tr>
							<td><a href="4_productos.html">Productos</a></td>
						</tr>
						<tr>
							<td><a href="7_login_signin.html">Iniciar Sesión</a></td>
						</tr>
						<tr>
							<td><a href="8_signin.html">Registrarse</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</header>
	<!-- MAIN -->
	<div class="container pad">
		<!-- RENGLON -->
		<!-- Titulo Iniciar Sesion-->
	 	<div class="row justify-content-center">
			<div class="col-xs-12 ">
				<h1 class="titulo text-center ">Iniciar Sesi&oacute;n</h1>
			</div>
		</div>
		<br>

		<!-- Formulario Iniciar Sesion -->
		<form  id="formlogin" name="formlogin" method="post" >
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="email" class="textcolorw">Email</label>
					<input type="email" class="form-control textcolorw" id="email" name="email"	aria-describedby="emailHelp" placeholder="Introduce tu email" required>
					<small id="emailHelp" class="form-text text-muted shadow-lg">No compartiremos su cuenta de correo con nadie más.</small>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group justify-content-center col-xs-12 col-4">
					<label for="pass" class="textcolorw">Contrase&ntilde;a</label>
					<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
				</div>
			</div>
			<!-- <div class="form-group form-check justify-content-center">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div> -->
			<!-- Boton para enviar datos -->
			
			<!-- error -->
		<div class="errorl ">
				<span>Datos de Ingreso no V&aacute;lidos, Int&eacute;ntalo de nuevo</span>
		</div>
		<br>
			<div class="row justify-content-center">
				<input type="submit" id="login" value="Iniciar Sesi&oacute;n" class=" btn btn-primary shadow-lg" onmouseover=validarLogin();>
			</div>
		</form>
		<br>
		<br>
		<br>
	</div>
		<!-- IMAGEN PARALLAX -->
		<div class="container-fluid">
			<div class="row justify-content-center ">
				
				<div class="content right2 illustration_06 img-fluid">
					<div class="caption1 d-none d-md-block rounded-pill blurb ">
						<h1 class="text-center w">¿No tienes una cuenta?</h1>
						<h4 class="text-center w">Regístrate gratis:</h4>
						<a href="8_signin.html"><img src=".\img\reg.png" class="img-fluid" alt="Responsive image" width="200" height="50"></a>
			 	    </div>
					<br>
	        		<br>
	        		<br>
					<br>
	        		<br>
	        		<br>
	        		<br>
					<br>
	    			<br>
					<br>
					<br>
					<br>
					<br>	
					<br>
					<br>
					<br>
	    		</div>
	    		<div class="smallscreen">
	  				<!-- <img class="img-fluid" src="./img/jard1.jpg"> -->
	  				<h1 class="text-center b shadow-lg">¿No tienes una cuenta?</h1>
					<h4 class="text-center b shadow-lg">Regístrate gratis:</h4>
					<center><a href="8_signin.html"><img src=".\img\reg.png" class="img-fluid shadow-lg p-3 mb-5 rounded" alt="Responsive image" width="200" height="50"></a></center>
				</div> 
			</div>
		</div>
		<!-- BANNER -->
		<!-- <div class="row justify-content-center">
			<div class="col-xs-12 ">
				<img src=".\img\jard1.jpg" class="img-fluid" alt="Responsive image" width="1300" height="537">	
			</div>
		</div> -->

<!-- 		<hr>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h1 class="text-center">¿No tienes una cuenta?</h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h4 class="text-center">Regístrate gratis:</h4>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<a href="8_signin.html"><img src=".\img\reg.png" class="img-fluid" alt="Responsive image" width="200" height="50"></a>
			</div>			
		</div>
		<hr>
	</div>		
	<br> -->
	<!-- FOOTER -->
	<footer class="mifooter">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xs-12">
					<h5 class="text-center">Siguenos en nuestras Redes Sociales</h5>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class=" col-xs-12 ">
					<a href="www.facebook.com"><img src=".\img\fb.png" class="img-fluid" alt="Responsive image" width="50" height="50"></a>
					<a href="www.instagram.com"><img src=".\img\ins.png" class="img-fluid" alt="Responsive image" width="50" height="50"></a>
					<a href="www.twitter.com"><img src=".\img\tw.png" class="img-fluid" alt="Responsive image" width="50" height="50"></a>
				</div>
			</div>
		</div>
		<div class="container-fluid ">
			<div class="row justify-content-center">
				<div class="col-xs-12">
					<p class="center">
						© 2019. Todos los derechos reservados. Aviso de privacidad. Políticas de devolución. <br>
						El uso de este sitio está sujeto a ciertos términos de uso que requieren un acuerdo legal entre Usted y El Jar&iacute;n de la Abuela. Esta aplicaci&oacute;n web es con fines acad&eacute;micos.
					</p>
				</div>
			</div>
		</div>	
	</footer>
	<!-- Scripts Bootstrap JQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- para barra de busqueda -->
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
	<!-- JavaScript Validaciones-->
	<script type="text/javascript" src=".\JS\val.js"></script>
	<!-- validar login -->
	<script type="text/javascript" src=".\JS\login.js"></script>
</body>
</html>