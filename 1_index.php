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
	else{
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>El Jard&iacute;n De la Abuela</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
				<a class="navbar-brand" href="1_index.php">
					<!-- logo -->
					<img src=".\img\logo.png" class="img-fluid" alt="Responsive image" width="60" height="60">El Jard&iacute;n de la Abuela
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse" id="navbarColor01" >
					<ul class="navbar-nav mr-auto">
						<!-- Opciones -->
						<li class="nav-item active rounded">
							<a class="nav-link" href="1_index.php">Inicio<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link" href="3_nosotros.php">Sobre Nosotros</a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link"href="4_productos.php">Productos</a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link" href="5_cursos.php">Cursos</a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link" href="3_nosotros.php">Contacto</a>
						</li>
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="¿Buscas algo?" aria-label="Search" id="inputBusqueda" >
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto rounded">
						<li class="rounded">
							<!-- Iniciar sesion -->
							<a class="nav-link" href="7_login_signin.php">Iniciar Sesi&oacute;n</a>
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
							<td><a href="1_index.php">Inicio</a></td>
						</tr>
						<tr>
							<td><a href="5_cursos.php">Cursos</a></td></a>
						</tr>
						<tr>
							<td><a href="3_nosotros.php">Empresa</a></td>
						</tr>
						<tr>
							<td><a href="3_nosotros.php">Contacto</a></td>
						</tr>
						<tr>
							<td><a href="1_index.php">Jardin</a></td>
						</tr>
						<tr>
							<td><a href="4_productos.php">Productos</a></td>
						</tr>
						<tr>
							<td><a href="7_login_signin.php">Iniciar Sesión</a></td>
						</tr>
						<tr>
							<td><a href="8_signin.php">Registrarse</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</header>
	<!-- MAIN -->
	<div class="container">
		<!-- Carrousel -->
		<div class="bd-example pad">
		<!-- <input type="search" placeholder="Buscar . . ." id="inputBusqueda"> -->
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			    <ol class="carousel-indicators">
			    	<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			      	<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			      	<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			    </ol>
			    <div class="carousel-inner">
			    	<div class="carousel-item active">
			        	<img src="./img/c6.jpg" class="d-block w-100" alt="...">
			        	<div class="carousel-caption d-none d-md-block rounded-pill blurb">
			          		<h5 class="w">LA MEJOR TIENDA DE JARDINERÍA</h5>
			          		<p class="w">Grandes art&iacute;culos que puedes encontrar</p>
			        	</div>
			      	</div>
			      	<div class="carousel-item">
			        	<img src="./img/2.jpg" class="d-block w-100" alt="...">
			      	</div>
			      	<div class="carousel-item">
			        	<img src="./img/3.png" class="d-block w-100" alt="...">
			        	<div class="carousel-caption d-none d-md-block rounded-pill blurb">
			          		<h5 class="w">APRENDE CON NUESTROS CURSOS</h5>
			 		         <p class="w">Pre&aacute;rate con los cursos y cuida tu jard&iacute;n.</p>
			 	       </div>
			    	</div>
			    </div>
			    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			      	<span class="sr-only">Previous</span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
			      	<span class="sr-only">Next</span>
			    </a>
			</div>
		</div>
		<hr>
	</div>
	<!-- Titulo -->
	<div class="container">
	 	<div class="row justify-content-center">
			<div class="col-xs-12 ">
				<h1 class="titulo text-center">El Jard&iacute;n De la Abuela</h1>
			</div>
		</div>
		<!-- Logo -->
		<div class="row justify-content-center">
			<div class="col-xs-12 ">
				<img src=".\img\logo.png" class="img-fluid" alt="Responsive image" width="233" height="215">
			</div>
		</div>
		<hr>
	</div>
	<!-- IMAGEN PARALLAX -->
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="smallscreen">
  				<img class="img-fluid" src="./img/jard2.jpeg">
  				<!-- <h2 class="b">¡ven y con&oacute;cenos!</h2>
        		<p class="b">Tenemos los mejores artículos para jardinería en la ciudad</p> -->
			</div>
			<div class="content left illustration_01 img-fluid blurw">
        		<br>
        		<br>
        		<br>
				<br>
        		<br>
        		<br>
        		<br>
				<br>
        		<p class="blurb">&nbsp;¡VEN Y CONÓCENOS! <br>
        		Tenemos los mejores artículos para jardinería  en la ciudad</p>
    			<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
    		</div>
		</div>
	</div>
	<!-- IMAGEN PARALLAX -->
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="smallscreen">
  				<img class="img-fluid" src="./img/4.jpg">
  				<!-- <h2 class="b">¡ven y con&oacute;cenos!</h2>
        		<p class="b">Tenemos los mejores artículos para jardinería en la ciudad</p> -->
			</div>
			<div class="content right illustration_02 img-fluid blurw">
        		<br>
        		<br>
        		<br>
				<br>
        		<br>
        		<br>
        		<br>
				<br>
        		<p class="blurb">&nbsp;¡CONTAMOS CON SERVICIOS DE JARDINERÍA! <br>
        		Anímate y pregunta por ellos.</p>
    			<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
    		</div>
		</div>
	</div>
	<!-- IMAGEN PARALLAX -->
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="smallscreen">
  				<img class="img-fluid" src="./img/c3.jpg">
  				<!-- <h2 class="b">¡ven y con&oacute;cenos!</h2>
        		<p class="b">Tenemos los mejores artículos para jardinería en la ciudad</p> -->
			</div>
			<div class="content right illustration_03 img-fluid blurw">
        		<br>
        		<br>
        		<br>
				<br>
        		<br>
        		<br>
        		<br>
				<br>
        		<p class="blurb">&nbsp;¡TÚ TAMBIÉN PUEDES HACERLO! <br>
        		Convertir tu jardín en un maravilloso lugar de tu hogar.</p>
    			<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
    		</div>
		</div>
	</div>
	<!-- IMAGEN PARALLAX -->
	<div class="container-fluid">
		<div class="row justify-content-center ">
			<div class="smallscreen">
  				<img class="img-fluid" src="./img/b2.jpg">
  				<!-- <h2 class="b">¡ven y con&oacute;cenos!</h2>
        		<p class="b">Tenemos los mejores artículos para jardinería en la ciudad</p> -->
			</div>
			<div class="content left illustration_04 img-fluid blurw">
        		<br>
        		<br>
        		<br>
				<br>
        		<br>
        		<br>
        		<br>
				<br>
        		<p class="blurb">&nbsp;¡Aprovecha nuestras promociones! <br>
        		y adquiere grandes productos sólo para ti y tu hogar.</p>
    			<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
    		</div>
		</div>
	</div>

<hr>
	<div class="container">
		<!-- Centro -->
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h1 class="text-center">¿Ya tienes cuenta?</h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h4 class="text-center">Registrate para comprar nuestros productos</h4>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<a href="8_signin.php"><img src=".\img\reg.png" class="img-fluid" alt="Responsive image" width="200" height="50"></a>
			</div>
		</div>
		<hr>
		<!-- <div class="row align-items-center">
			<div class="col-xs-12 col-sm-6 col-md-7">
				<p>Aprovecha estas grandes promociones que tenemos para ti</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-5">
				<img src=".\img\b4.png" class="img-fluid" alt="Responsive image" width="500" height="137">
			</div>
		</div>	 -->
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
							<li><a href="3_nosotros.php">Preguntas Frecuentes</a></li>
							<li><a href="3_nosotros.php">Sobre Nosotros</a></li>
							<li><a href="3_nosotros.php">Cont&aacute;ctanos</a></li>
						</ul>
					</p>
				</div>
				<div class="col-auto col-xs-12 col-sm-4 col-md-4 align-self-center">
					<p >
						<ul>
							<h5>Sitios Recomendados</h5>
							<li><a href="5_cursos.php">Nuestros Cursos</a></li>
							<li><a href="5_cursos.php">Plantas</a></li>
							<li><a href="4_productos.php">Productos</a></li>
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

</body>
</html>