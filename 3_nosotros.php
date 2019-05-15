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
	<title>Sobre Nosotros</title>
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

				<div class="navbar-collapse collapse" id="navbarColor01" style="">
					<ul class="navbar-nav mr-auto">
						<!-- Opciones -->
						<li class="nav-item ">
							<a class="nav-link" href="1_index.php">Inicio</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="3_nosotros.php">Sobre Nosotros<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link"href="4_productos.php">Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="5_cursos.php">Cursos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="3_nosotros.php">Contacto</a>
						</li>
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda" onBlur=foco();>
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto">
						<li>
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
		<!-- LOGO -->
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<!-- Logo -->
				<img src=".\img\logo.png" class="img-fluid" alt="Responsive image" width="285" height="256">
			</div>
		</div>
		<!-- IMAGEN PARALLAX -->
		<div class="container-fluid">
			<div class="row justify-content-center ">
				<div class="smallscreen">
	  				<!-- <img class="img-fluid" src="./img/b5.jpg"> -->
	  				<!-- <h2 class="b">¡ven y con&oacute;cenos!</h2>
	        		<p class="b">Tenemos los mejores artículos para jardinería en la ciudad</p> -->
				</div>
				<div class="content right2 illustration_05 img-fluid blurw">
					<div class="carousel-caption d-none d-md-block blurb">
			        	<h5 class="w">SOBRE NOSOTROS</h5>
			 		    <p class="w">El Jardín de la Abuela.</p>
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
			</div>
		</div>
		<!-- BANNER -->
		<!-- <div class="row justify-content-center">
			<div class="col-xs-12">
				<img src=".\img\b5.jpg" class="img-fluid" alt="Responsive image" width="1200" height="537">	
			</div>
		</div> -->
		<br>
		<hr>
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<div class="col-xs-12 ">
				<!-- Titulo -->
				<h1  class="titulo text-center">EL JARD&Iacute;N DE LA ABUELA</h1>
			</div>
		</div>
		<br>
		<!-- RENGLON -->
		<div class="row justify-content-justify">
			<div class="col-xs-12 ">
				<p class="text-center">
					El Jardín de la abuela es un negocio que ofrece los siguientes servicios: 
					Venta de productos de jardinería (herramientas, aspersores, macetas, costales de tierra, graba de ornamento, semillas florales y de plantas, muebles de jardín, entre otros.) 
					Oferta de diversos cursos de jardinería, en los cuales se enseñan consejos, técnicas y métodos que ayudan tanto a construir tu propio jardín ideal, como al cuidado de las plantas.
				</p>
			</div>
		</div>
		<br>
		<br>
		<br>
		<hr>
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<div class="col-auto  col-xs-12  col-md-4 align-self-center">
				<h3 class="text-center">Misi&oacute;n</h3>
				<p class="text-justify">
					Brindar el mejor servicio y atención a nuestros clientes, buscando satisfacer sus necesidades y requerimientos de jardiner&iacute;.
				</p>
			</div>
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<h3 class="text-center">Visi&oacute;n</h3>
				<p class="text-justify">
					Ser un empresa líder nacional en servicio y atención, con un enfoque dirigido hacia las mejoras de jard&iacute; del hoogar.
				</p>
			</div>
		</div>
		<br>
		<br>
		<hr>
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<h3 class="text-center">Preguntas Frecuentes</h3>
				<p class="text-center">
					FAQs sobre envío <br>
					¿Realizan envíos? <br>
					<br>
					FAQs sobre incidencias<br>
					¿Tienen una atención al cliente?<br>
					¿Se permiten devoluciones?<br>
					¿Cómo puedo contactar con ustedes?<br>
					¿Qué hago si el producto no es el que quiero?<br>
					<br>
				</p>
			</div>
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<h3 class="text-center">Contactos corporativos</h3>
				<p class="text-justify">
					México
					El Jardin de la Abuela (para consumidores)
					001-800 696-4723 Correo (para empresas y consumidores)
					abuelasgarden@mail.com 
				</p>
			</div>
		</div>
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<p class="text-center">
					FAQs sobre el producto<br>
					¿El producto realmente es natural?<br>
					¿El producto es auténtico?<br>
					¿El producto es seguro para niños?<br>
				</p>
			</div>
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<h3 class="text-center">Dirección corporativa</h3>
				<p class="text-justify">
					BLVD. GUADALUPE VICTORIA 219, <br>
					LAS ENCINAS,DURANGO,C.P.34039,DGO <br>
					(618)128-8253
				</p>
			</div>
		</div>
	</div>
	<hr>
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