<?php 

	$conexion=mysqli_connect('localhost','Sebastian','ifuseekamy','jardinabuela');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- JavaScript -->
	<script type="text/javascript" src=".\JS\funciones.js"></script>
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
	<!-- ICONO EN LA PESTAÑA -->
	<link rel="shortcur icon" href=".\img\icon.png">
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
						<li class="nav-item">
							<a class="nav-link" href="2_index_2.php">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="3_nosotros2.html">Sobre Nosotros</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link"href="4_productos2.php">Productos<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="5_cursos2.html">Cursos</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="3_nosotros2.html">Contacto</a>
						</li> -->
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda" onBlur=foco();>
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto ul2">
						<li>
							<!-- Carrito -->
							<a class="nav-link" href="9_carrito.html">Carrito <img src="./img/car.png" class="img-fluid" alt="Responsive image" width="20" height="20"></a>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- Example single danger button -->
					</ul>
					<!-- Dropdown MI CUENTA -->
					<ul class="navbar-nav mr-auto ">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="12_cuenta.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Cuenta</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="12_cuenta.html">Perfil</a>
								<a class="dropdown-item" href="11_orden.html">Mis Ordenes</a>
								<!-- <a class="dropdown-item" href="5_cursos2.html">Mis Cursos</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="php/salir.php">Cerrar Sesi&oacute;n</a>
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
	<div class="container">
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h1 class="titulo pad text-center">Productos</h1>
			</div>
		</div>
		<br>
		<!-- sql="SELECT * from usuarios";
									$result=mysqli_query($conexion,$sql);

									while($mostrar=mysqli_fetch_array($result)){
										?>	 -->
		<?php
			$sql = "SELECT imagen FROM productos"; 
    		$result = mysql_query($conexion,$sql);
    		$imagen = $result[0];
    		echo $imagen;
		    // while($row = mysql_fetch_array($result)) {
		    // 	echo '<img src="data:image/jpeg;base64,'.base64_encode($result).'"/>';
		?>
		<?php       
		    // }
		    
		    mysql_close($conn);
		?>
		<div class="row justify-content-center">
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					
					
					<img src="<?php echo $mostrar['imagen']; ?>" class="card-img-top" alt="Producto2">
					<div class="card-body">
						<h5 class="card-title blurw"><?php echo $mostrar['descripcion'] ?></h5>
					   	<p class="card-text blurw text-justify"><?php echo $mostrar['precio'] ?></p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>	
			</div>
		</div>
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					<img src=".\img\p2.jpg" class="card-img-top" alt="Producto2">
					<div class="card-body ">
						<h5 class="card-title blurw">Producto 2</h5>
					   	<p class="card-text blurw text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>	
			</div>
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					<img src=".\img\p2.jpg" class="card-img-top" alt="Producto3">
					<div class="card-body">
						<h5 class="card-title blurw">Producto 3</h5>
					   	<p class="card-text blurw text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>	
			</div>
		</div>
		<br>
		<br>
		<!-- RENGLON -->
		<div class="row justify-content-center">
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					<img src=".\img\p4.jpg" class="card-img-top" alt="Producto4">
					<div class="card-body">
						<h5 class="card-title blurw">Producto 4</h5>
					   	<p class="card-text blurw text-justify">Tenemos los mejores artículos para jardinería en la ciudad, ven y con&oacute;cenos!</p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>
			</div>
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					<img src=".\img\p5.jpg" class="card-img-top" alt="Producto5">
					<div class="card-body">
						<h5 class="card-title blurw">Producto 5</h5>
					   	<p class="card-text blurw text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>	
			</div>
			<!-- COLUMNA -->
			<div class="col-auto col-xs-12 col-md-4 align-self-center">
				<!-- Tarjeta de producto -->
				<div class="card" style="width: 18rem;">
					<img src=".\img\p6.jpg" class="card-img-top" alt="Producto6">
					<div class="card-body">
						<h5 class="card-title blurw">Producto 6</h5>
					   	<p class="card-text blurw text-justify">Tenemos los mejores artículos para jardinería en la ciudad, ven y con&oacute;cenos!</p>
					   	<a href="#" class="btn btn-primary">Agregar al Carrito</a>
					</div>
				</div>	
			</div>
		</div>
		<hr>

		<div class="row justify-content-center">
			<nav aria-label="...">
				<ul class="pagination">
					<li class="page-item disabled">
						<span class="page-link">Previous</span>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active" aria-current="page">
						<span class="page-link">
							2
							<span class="sr-only">(current)</span>
						</span>
					</li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
		</div>
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
							<li><a href="3_nosotros2.html">Preguntas Frecuentes</a></li>
							<li><a href="3_nosotros2.html">Sobre Nosotros</a></li>
							<li><a href="3_nosotros2.html">Cont&aacute;ctanos</a></li>
						</ul>
					</p>
				</div>
				<div class="col-auto col-xs-12 col-sm-4 col-md-4 align-self-center">
					<p >
						<ul>
							<h5>Sitios Recomendados</h5>
							<li><a href="5_cursos2.html">Nuestros Cursos</a></li>
							<li><a href="5_cursos2.html">Plantas</a></li>
							<li><a href="4_productos2.html">Productos</a></li>
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
