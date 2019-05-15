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
	<title>Pago</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
</head>

<body class="mibody" onload=carga();> 
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
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda">
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto ul2">
						<li>
							<!-- Carrito -->
							<a class="nav-link active" href="9_carrito.php">Carrito <img src="./img/car.png" class="img-fluid" alt="Responsive image" width="20" height="20"></a>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- Example single danger button -->
					</ul>
					<!-- Dropdown MI CUENTA -->
					<ul class="navbar-nav mr-auto ">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="12_cuenta.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['nombre'] ?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="12_cuenta.php">Perfil</a>
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
	<br>
	<hr>
	<!-- MAIN -->
	<div class="container pad">
		<!-- RENGLON -->
	 	<div class="row justify-content-center">
			<div class="col-xs-12 align-self-center">
				<!-- Titulo Carrito-->
				<h1 class="titulo text-center">Realizar Pago de mi Pedido</h1>
			</div>
		</div>
		<br>
		<table class="table bgblanco textcolorb">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Producto</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Precio</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Producto 1
						<br>
						<img src=".\img\p4.jpg" width="90" height="95">
					</td>
					<td>2</td>
					<td>$$$</td>
				</tr>
				<tr>
					<td>
						Producto 2
						<br>
						<img src=".\img\p5.jpg" width="90" height="95">
					</td>
					<td>1</td>
					<td>$$$</td>
				</tr>
				<tr>
					<td>
						Producto 3
						<br>
						<img src=".\img\p6.jpg" width="90" height="95">
					</td>
					<td>1</td>
					<td>$$$</td>
				</tr>
			</tbody>
		</table>
		<br>
		<br>
		<br>
		<div class="row justify-content-center">
			<div class="col-xs-12">
				<h3>Metodo de Pago:</h3>
			</div>
		</div>
		<!-- Formulario Pago-->
		<form id="formPago" action="#" method="post" >
			<!-- RENGLON -->
			<div class="form-check">
				<div class="row justify-content-center">
					<div class="form-group col-xs-12 col-6">
						<input class="form-check-input" type="radio" name="pago" id="tienda" value="option1" onclick=deshabilitar();>
						<label class="form-check-label textcolorw" for="tienda">Pagar en la tienda</label>
					</div>
					<div class="form-group col-xs-12 col-6 text-center">
						<input class="form-check-input " type="radio" name="pago" id="tarjeta" value="option2" onclick=habilitar();>
						<label class="form-check-label textcolorw text-center" for="gridRadios2">Pagar con Tarjeta</label>
					</div>
				</div>
			</div>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<br>
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-6">
					<p class="text-justify">
						Con esta opción se generar&aacute; su orden de pedido, en cuanto recoja su pedido en la tienda, ud. pagar&aacute; el monto correspondiente.
						</p>
				</div>
				<div class="form-group col-xs-12 col-6 " >
					<!-- RENGLON -->
					<div class="row justify-content-center">
						<div class="form-group col-xs-12 ">
							<label for="numtar" class="textcolorw">N&uacute;mero de Tarjeta</label>
							<input type="text" class="form-control" id="ntarjeta" placeholder="8888888888888888" required=”required” onblur=validarNombre();>
						</div>
					</div>
					<!-- RENGLON -->
					<div class="row justify-content-center">
						<div class="form-group col-xs-12 ">
							<label for="propietario" class="textcolorw">Nombre</label>
							<input type="text" class="form-control" id="nombre1" placeholder="Tu nombre" required=”required” onblur=validarNombre();>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="form-group col-xs-12 ">
							<label for="vence" class="textcolorw">Vence en:</label>
							<!-- <input type="date"  id="expire" min="2019-01-01" max="2020-01-31" required> -->
							<input type="text" class="form-control" id="expire" placeholder="MM / YYYY" pattern="\d{1,2}/\d{4}"  >
						</div>
					</div>
					<!-- RENGLON -->
					<div class="row justify-content-center">
						<div class="form-group col-xs-12 ">
							<label for="cvc" class="textcolorw">N&uacute;mero de Seguridad</label>
							<input type="text" class="form-control" id="num" placeholder="CVC" required=”required” onblur=validarNombre();>
						</div>
					</div>

				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4 align-self-center text-center">
					<a class="btn btn-primary textcolorb" role="button" href="9_carrito.php">Cancelar</a>
					<!-- <button type="submit" class="btn btn-primary" >Cancelar</button> -->
				</div>
				<div class="form-group col-xs-12 col-4 align-self-center text-center">
					<input type="button" id="btpago" type="submit" value="Generar Orden de Pedido" class="btn btn-primary shadow-lg disabled"  onclick=validarPago(); disabled=true>
					<!-- <button type="submit" class="btn btn-primary" >Generar Orden de Pedido</button> -->
				</div>
			</div>
		</form>
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
	<!-- para barra de busqueda -->
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
	<!-- JavaScript Validaciones-->
	<script type="text/javascript" src=".\JS\val.js"></script>
	
</body>
</html>