<?php
	// Sesiones acceder a variable de sesion
	session_start();
	// si existe la variable de sesiones
	if(isset($_SESSION['user'])) {
		// que tipo se usuario ingresa para redireccionar
		if($_SESSION['user']['tipo'] != "Admin"){
			header('Location: 2_index_2.php ');
		}
	}else {//no existe, nadie se ha loggeado
			header('Location: 1_index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>C - Eliminar</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- Alertify -->
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/themes/default.css">
	<script src="./alertifyjs/alertify.js"></script>
	<!-- sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
</head>

<body class="adminbody">
<!--  <body>-->
	<!-- HEADER -->
	<header class="container-fluid">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<a class="navbar-brand " href="13_admin_index.php">
					<!-- logo -->
					<img src=".\img\logo.png" class="img-fluid " alt="Responsive image" width="60" height="60">El Jard&iacute;n de la Abuela - A D M I N I S T R A D O R - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="navbar-collapse collapse" id="navbarColor01" style="">
					<!-- Barra Busqueda  -->
					<form class="form-inline justify-content-center" id="barra_bus" name="barra_bus">
						<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" id="inputBusqueda" >
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto">
						<li class="rounded">
							<!-- Cerrar Sesion -->
							<a class="nav-link" href="./php/salir.php">Cerrar Sesi&oacute;n</a>
						</li>
					</ul>
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
							<td><a href="13_admin_index.php">Inicio</a></td>
						</tr>
						<tr>
							<td><a href="14_a_usuarios.php">Usuarios</a></td></a>
						</tr>
						<tr>
							<td><a href="19_a_cursos.php">Cursos</a></td>
						</tr>
						<tr>
							<td><a href="24_a_productos.php">Productos</a></td>
						</tr>
						<tr>
							<td><a href="http://localhost:8080/vincula/insertarU.jsp">Insertar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="16_u_eliminar.php">Eliminar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="18_u_consultar.php">Consultar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="17_u_actualizar.php">Actualizar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="http://localhost:8080/vincula/insertarC.jsp">Insertar Curso</a></td>
						</tr>
						<tr>
							<td><a href="21_c_eliminar.php">Eliminar Curso</a></td>
						</tr>
						<tr>
							<td><a href="23_c_consultar.php">Consultar Curso</a></td>
						</tr>
						<tr>
							<td><a href="22_c_actualizar.php">Actualizar Curso</a></td>
						</tr>
						<tr>
							<td><a href="http://localhost:8080/vincula/insertarP.jsp">Insertar Producto</a></td>
						</tr>
						<tr>
							<td><a href="26_p_eliminar.php">Eliminar Producto</a></td>
						</tr>
						<tr>
							<td><a href="28_p_consultar.php">Consultar Producto</a></td>
						</tr>
						<tr>
							<td><a href="27_p_actualizar.php">Actualizar Producto</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</header>
	<br>
	<!-- MAIN -->
	<div class="container pad">
		<!-- RENGLON -->
	 	<div class="row justify-content-center">
			<div class="col-xs-12 align-self-center">
				<!-- Titulo Admin-->
				<h1 class="titulo text-center b">Administrador <?php echo $_SESSION['user']['nombre'] ?></h1>
				<h1 class="titulo2 text-center b">ELIMINAR CURSO</h1>
			</div>
		</div>
		<hr>
		<br>
		<br>
		<br>

		<!-- Menu de navegacion -->
		<div class="row">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-tabindex" role="tablist" aria-orientation="vertical">
					<a class="nav-link " id="home" data-toggle="pill" href="#v-tabhome" role="tab" aria-controls="v-pills-home" aria-selected="true">Inicio - Opciones</a>
					<a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-tabusuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false">Usuarios</a>
					<a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="#v-tabcursos" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cursos</a>
					<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-tabproductos" role="tab" aria-controls="v-pills-settings" aria-selected="false">Productos</a>
				</div>
			</div>
			<!-- Contenido de los tabs -->
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
					<!-- MENU INICIO -->
					<div class="tab-pane fade " id="v-tabhome" role="tabpanel" aria-labelledby="v-pills-home-tab">

							<div class="row justify-content-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<P>- I N I C I O-</P>
									<p>De clic en una opcion</p>
								</div>
							</div>
							<div class="row justify-content-center text-center">
								<div class="col-sm-12 col-md-3 align-self-center">
									<a class="btn btn-primary textcolorb" href="14_a_usuarios.php" role="button">Usuarios</a>
								</div>
								<div class="col-sm-12 col-md-3 align-self-center">
									<a class="btn btn-primary textcolorb" href="19_a_cursos.php" role="button">Cursos</a>
								</div>
								<div class="col-sm-12 col-md-3 align-self-center">
									<a class="btn btn-primary textcolorb" href="24_a_productos.php" role="button">Productos</a>
								</div>
							</div>

					</div>
					<!-- MENU USUARIOS -->
					<div class="tab-pane fade " id="v-tabusuarios" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<!-- RENGLON -->
						<div class="row justify-content-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<p>- U S U A R I O S -</p>
									<p>De clic en una opcion</p>
								</div>
							</div>
						<div class="row justify-content-center text-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="http://localhost:8080/vincula/insertarU.jsp" role="button">Agregar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="16_u_eliminar.php" role="button">Eliminar</a>
							</div>
						</div>
						<br>
						<!-- RENGLON -->
						<div class="row justify-content-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="17_u_actualizar.php" role="button">Actualizar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="18_u_consultar.php" role="button">Consultar</a>
							</div>
						</div>
					</div>
					<!-- MENU CURSOS -->
					<div class="tab-pane fade show active" id="v-tabcursos" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<!-- TITULO -->
						<div class="row justify-content-center">
							<div class="col-sm-12 sm-col-4 col-4align-self-center text-center">
								<p>- C U R S O S - E L I M I N A R -</p>
								<label  class=" b text center">Selecciona un curso y presiona Eliminar para borrarlo:</label>
								<br>
								<br>
								<br>
								<button id="btn_del" class="btn btn-dark">Eliminar</button>
							</div>
						</div>
						<br>
						<div id="data"></div>
						<!-- CONTENIDO -->
						<!-- TABLA  -->
							<!-- <table class="table bgblanco textcolorb table-responsive-md">
								<caption>CURSOS EN SISTEMA</caption>
								<thead class="thead-dark">
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nombre</th>
										<th scope="col">Descripcion</th>
										<th scope="col">Precio</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table> -->
							<br>
							<br>
							<!-- Formulario Registro-->
							<!-- <form action="#" method="post" >
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Escribe ID para eliminar:</label> -->
									<!-- <div class=" col-xs-12 col-4"> -->
									<!-- <div class="col-sm-4 ">
										<input type="text" class="form-control" id="nombre" placeholder="id" required=”required”>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<button type="submit" class="btn btn-primary" >Buscar Registro</button>
									</div>
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<button type="submit" class="btn btn-primary" >Eliminar Registro</button>
									</div>
								</div>
							</form> -->
							<br>
							<br>
							<!-- BOTON PARA REGRESAR A OPCIONES -->
							<div class="row justify-content-center text-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<a class="btn btn-primary textcolorb" href="19_a_cursos.php" role="button">Regresar a Opciones Curso</a>
								</div>
							</div>
					</div>
					<!-- MENU PRODUCTOS -->
					<div class="tab-pane fade" id="v-tabproductos" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<!-- RENGLON -->
						<div class="row justify-content-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<P>- P R O D U C T O S -</P>
									<p>De clic en una opcion</p>
								</div>
							</div>
						<div class="row justify-content-center text-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="http://localhost:8080/vincula/insertarP.jsp" role="button">Agregar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="26_p_eliminar.php" role="button">Eliminar</a>
							</div>
						</div>
						<br>
						<!-- RENGLON -->
						<div class="row justify-content-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="27_p_actualizar.php" role="button">Actualizar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="28_p_consultar.php" role="button">Consultar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<hr>
	</div>

	<footer class="mifooter">
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
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
	<!-- JavaScript -->
	<script type="text/javascript" src=".\JS\validar.js"></script>
	<script type="text/javascript" src=".\JS\eliminarC.js"></script>
</body>
</html>

<script>
	$(buscar_datos());

	function buscar_datos(){
		$.ajax({
			url:"php/buscareliminarC.php",
			type:"POST",
			dataType:'html'
			// data: {consulta: consulta},
		})
		.done(function(respuesta){
			console.log(respuesta);
			$("#data").html(respuesta);
		})
		.fail(function(){
			console.log("Error");
		})
	}
	$(document).on('load', function(){
			buscar_datos();

	});

</script>