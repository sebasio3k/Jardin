<?php
	// Sesiones acceder a variable de sesion
	session_start();
	// si existe la variable de sesiones
	if(isset($_SESSION['user'])) {
		// que tipo se usuario ingresa para redireccionar
		if($_SESSION['user']['tipo'] != "Usuario"){
			header('Location: 13_admin_index.php ');
		}
	}else {//no existe, nadie se ha loggeado
			header('Location: 1_index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ordenes</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
</head>

<body class="mibody">
<!--  <body>-->
	<!-- HEADER -->
	<header class="container-fluid">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<a class="navbar-brand" href="2_index_2.php">
					<!-- logo -->
					<img src=".\img\logo.png" class="img-fluid" alt="Responsive image" width="60" height="60">El Jard&iacute;n de la Abuela
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse" id="navbarColor01" style="">
					<ul class="navbar-nav mr-auto ul2">
						<!-- Opciones -->
						<li class="nav-item active">
							<a class="nav-link" href="2_index_2.php">Inicio<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="3_nosotros2.php">Sobre Nosotros</a>
						</li>
						<li class="nav-item">
							<a class="nav-link"href="4_productos2.php">Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="5_cursos2.php">Cursos</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="3_nosotros2.php">Contacto</a>
						</li> -->
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center" id="barra_bus" name="barra_bus">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda" >
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto ul2">
						<li>
							<!-- Carrito -->
							<a class="nav-link" href="9_carrito.php">Carrito <img src="./img/car.png" class="img-fluid" alt="Responsive image" width="20" height="20">( <?php echo $_SESSION['cuantos'];?> )</a>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- Example single danger button -->
					</ul>
					<!-- Dropdown MI CUENTA -->
					<ul class="navbar-nav mr-auto ">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="12_cuenta.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['nombre'] ?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="12_cuenta.php">Mi Perfil</a>
								<a class="dropdown-item" href="11_orden.php">Mis Ordenes</a>
								<!-- <a class="dropdown-item" href="5_cursos2.php">Mis Cursos</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./php/salir.php">Cerrar Sesi&oacute;n</a>
							</div>
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
							<td><a href="2_index_2.php">Inicio</a></td>
						</tr>
						<tr>
							<td><a href="5_cursos2.php">Cursos</a></td></a>
						</tr>
						<tr>
							<td><a href="3_nosotros2.php">Empresa</a></td>
						</tr>
						<tr>
							<td><a href="3_nosotros2.php">Contacto</a></td>
						</tr>
						<tr>
							<td><a href="2_index_2.php">Jardin</a></td>
						</tr>
						<tr>
							<td><a href="4_productos2.php">Productos</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</header>
	<!-- CUERPO -->
	<div class="container pad">
		<!-- RENGLON -->
	 	<div class="row justify-content-center">
			<div class="col-xs-12 align-self-center">
				<!-- Titulo Carrito-->
				<h1 class="titulo text-center">Mis Ordenes</h1>
			</div>
		</div>
		<br>
		<table class="table bgblanco textcolorb">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Num. Orden</th>
					<th scope="col">Ver Reporte</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<!--  -->
						1
					</td>
					<td><a href="10_pago.php"> Ver Reporte </a></td>
				</tr>
				<tr>
					<td>
						<!--  -->
						2
					</td>
					<td><a href="10_pago.php"> Ver Reporte </a></td>
				</tr>
			</tbody>
		</table>
		<br>
		<br>
		<!-- BOTON SEGUIR COMPRANDO -->
		<div class="row justify-content-center">
			<div class="form-group col-xs-12 col-4 align-self-center text-center">
				<a class="btn btn-primary textcolorb" role="button" href="4_productos2.php">Seguir Comprando</a>
			</div>
		</div>
		<br>
		<br>
		<hr>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<p class="text-center">
					Ud. podr&aacute; recoger sus productos en la dirección <br>
					BLVD. GUADALUPE VICTORIA 219, LAS ENCINAS,DURANGO,<br>
					C.P.34039,DGO (618)128-8253. En la fecha del reporte <br>
					correspondiente
				</p>
			</div>
		</div>

		<hr>
	</div>
	<!-- FOOTER -->
	<footer class="mifooter">
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-auto col-xs-12 col-sm-4 col-md-4 align-self-center">
					<p>
						<ul>
							<h5 >Cu&eacute;ntanos...</h5>
							<h6>¿Cómo podemos ayudarte?</h6>
							<li><a href="3_nosotros2.php">Preguntas Frecuentes</a></li>
							<li><a href="3_nosotros2.php">Sobre Nosotros</a></li>
							<li><a href="3_nosotros2.php">Cont&aacute;ctanos</a></li>
						</ul>
					</p>
				</div>
				<div class="col-auto col-xs-12 col-sm-4 col-md-4 align-self-center">
					<p >
						<ul>
							<h5>Sitios Recomendados</h5>
							<li><a href="5_cursos2.php">Nuestros Cursos</a></li>
							<li><a href="5_cursos2.php">Plantas</a></li>
							<li><a href="4_productos2.php">Productos</a></li>
						</ul>
					</p>
				</div>
				<div class="col-auto col-xs-12 col-sm-4 col-md-4">
					<center>
					<img src=".\img\ub2.png" class="img-fluid" alt="Responsive image" width="100" height="100"> <br>
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14579.894646855166!2d-104.6529634!3d23.99670715!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1552176236413" width="200" height="200" frameborder="0" style="border:0" allowfullscreen>
					</iframe>
					</center>
				</div>
			</div>
			
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
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
	<!-- JavaScript -->
	<script type="text/javascript" src=".\JS\validar.js"></script>
</body>
</html>