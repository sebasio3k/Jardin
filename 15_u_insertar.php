<?php 

	$conexion=mysqli_connect('localhost','root','','jardinabuela');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>U - Insertar</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
</head>

<body class="adminbody"> 
	<!-- HEADER -->
	<header class="container-fluid">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<a class="navbar-brand " href="13_admin_index.html">
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
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda" >
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto">
						<li>
							<!-- Cerrar Sesion -->
							<a class="nav-link" href="7_login_signin.html">Cerrar Sesi&oacute;n</a>
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
							<td><a href="13_admin_index.html">Inicio</a></td>
						</tr>
						<tr>
							<td><a href="14_a_usuarios.html">Usuarios</a></td></a>
						</tr>
						<tr>
							<td><a href="19_a_cursos.html">Cursos</a></td>
						</tr>
						<tr>
							<td><a href="24_a_productos.html">Productos</a></td>
						</tr>
						<tr>
							<td><a href="15_u_insertar.html">Insertar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="16_u_eliminar.html">Eliminar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="18_u_consultar.html">Consultar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="17_u_actualizar.html">Actualizar Usuario</a></td>
						</tr>
						<tr>
							<td><a href="20_c_insertar.html">Insertar Curso</a></td>
						</tr>
						<tr>
							<td><a href="21_c_eliminar.html">Eliminar Curso</a></td>
						</tr>
						<tr>
							<td><a href="23_c_consultar.html">Consultar Curso</a></td>
						</tr>
						<tr>
							<td><a href="22_c_actualizar.html">Actualizar Curso</a></td>
						</tr>
						<tr>
							<td><a href="25_p_insertar.html">Insertar Producto</a></td>
						</tr>
						<tr>
							<td><a href="26_p_eliminar.html">Eliminar Producto</a></td>
						</tr>
						<tr>
							<td><a href="28_p_consultar.html">Consultar Producto</a></td>
						</tr>
						<tr>
							<td><a href="27_p_actualizar.html">Actualizar Producto</a></td>
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
				<h1 class="titulo text-center textcolorb">INSERTAR USUARIO</h1>
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
					<a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-tabusuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false">Usuarios</a>
					<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-tabcursos" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cursos</a>
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
									<a class="btn btn-primary textcolorb" href="14_a_usuarios.html" role="button">Usuarios</a>
								</div>
								<div class="col-sm-12 col-md-3 align-self-center">
									<a class="btn btn-primary textcolorb" href="19_a_cursos.html" role="button">Cursos</a>
								</div>
								<div class="col-sm-12 col-md-3 align-self-center">
									<a class="btn btn-primary textcolorb" href="24_a_productos.html" role="button">Productos</a>
								</div>
							</div>

					</div>
					<!-- MENU USUARIOS -->
					<div class="tab-pane fade show active" id="v-tabusuarios" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<!-- RENGLON -->
						<div class="row justify-content-center">
								<div class="col-sm-12 sm-col-4 col-4align-self-center text-center">
									<p>- U S U A R I O S - I N S E R T A R-</p>
									<p>LLene campos para insertar usuario.</p>
								</div>
							</div>
						<!-- <div class="row justify-content-center text-center"> -->
							<!-- Formulario Registro-->
							<form action="#" method="post" >
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Nombre</label>
									<!-- <div class=" col-xs-12 col-4"> -->
									<div class="col-sm-4 ">
										<input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required=”required” onblur=validarNombre();>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Apellido paterno</label>
									<div class="col-sm-4 ">
										<input type="text" class="form-control" id="ap" placeholder="Apellido Paterno" required=”required” onblur=validarAp>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Apellido materno</label>
									<div class="col-sm-4 ">
										<input type="text" class="form-control" id="am" placeholder="Apellido Materno" required=”required” onblur=validarAm>
									</div>
								</div>
								<!-- SEXO -->
								<div class="row form-group justify-content-center">
									<div class="form-group col-sm-12  col-auto text-center">
										<label for="exampleInputEmail1" class="textcolorw text-center">Sexo</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="sexo" id="rmujer" value="option1" checked>
											<label class="form-check-label textcolorw" for="gridRadios1">
												Mujer
											</label>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="form-check-input" type="radio" name="sexo" id="rhombre" value="option2">
											<label class="form-check-label textcolorw" for="gridRadios2">
												Hombre
											</label>
										</div>
									</div>
								</div>
								<!-- RENGLON -->
								<!-- <div class="row justify-content-center">
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<label for="exampleInputEmail1" class="textcolorw text-center">Sexo</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="sexo" id="mujer" value="option1" checked>
											<label class="form-check-label textcolorw" for="gridRadios1">
												Mujer
											</label>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="form-check-input" type="radio" name="sexo" id="hombre" value="option2">
											<label class="form-check-label textcolorw" for="gridRadios2">
												Hombre
											</label>
										</div>
									</div>
								</div> -->
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Tel&eacute;fono</label>
									<div class="col-sm-4 ">
										<input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" onblur=validarTel>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Email</label>
									<div class="col-sm-4 ">
										<input type="email" class="form-control textcolorw" id="email" placeholder="Enter email" >
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputPassword1 " class="col-sm-2 col-form-label textcolorB">Contrase&ntilde;a</label>
									<div class="col-sm-4 ">
										<input type="password" class="form-control" id="pass" placeholder="Password">
									</div>
								</div>
								<!-- RENGLON -->
								<!-- <div class="row justify-content-center">
									<div class="form-group justify-content-center  col-xs-12 col-4">
										<label for="exampleInputPassword1 " class="textcolorw">Verificar Contrase&ntilde;a</label>
										<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
									</div>
								</div> -->
								<!-- RENGLON -->
								<div class="row justify-content-center">
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<button type="submit" class="btn btn-primary" onclick=validarCamp>Insertar Usuario</button>
									</div>
								</div>
							</form>
							<br>
							<br>
							<!-- TABLA  -->
							<table class="table bgblanco textcolorb table-responsive-md">
								<caption>USUARIOS EN SISTEMA</caption>
								<thead class="thead-dark">
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido Paterno</th>
										<th scope="col">Apellido Materno</th>
										<th scope="col">Sexo</th>
										<th scope="col">Tel&eacute;fono</th>
										<th scope="col">Correo</th>
										<th scope="col">Contrase&ntilde;a</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$sql="SELECT * from usuarios";
									$result=mysqli_query($conexion,$sql);

									while($mostrar=mysqli_fetch_array($result)){
										?>	

									<tr>
										<td><?php echo $mostrar['idusuario'] ?></td>
										<td><?php echo $mostrar['nombre'] ?></td>
										<td><?php echo $mostrar['apaterno'] ?></td>
										<td><?php echo $mostrar['amaterno'] ?></td>
										<td><?php echo $mostrar['sexo'] ?></td>
										<td><?php echo $mostrar['telefono'] ?></td>
										<td><?php echo $mostrar['email'] ?></td>
										<td><?php echo $mostrar['password'] ?></td>
									</tr>
										<?php 
									}
							 		?>
								</tbody>
							</table>
							<br>
							<div class="row justify-content-center text-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<a class="btn btn-primary textcolorb" href="14_a_usuarios.html" role="button">Regresar a Opciones Usuario</a>
								</div>
							</div>
						<!-- </div> -->
					</div>
					<!-- MENU CURSOS -->
					<div class="tab-pane fade" id="v-tabcursos" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<!-- RENGLON -->
						<div class="row justify-content-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<P>- C U R S O S -</P>
									<p>De clic en una opcion</p>
								</div>
							</div>
						<div class="row justify-content-center text-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="20_c_insertar.html" role="button">Agregar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="21_c_eliminar.html" role="button">Eliminar</a>
							</div>
						</div>
						<br>
						<!-- RENGLON -->
						<div class="row justify-content-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="22_c_actualizar.html" role="button">Actualizar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="23_c_consultar.html" role="button">Consultar</a>
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
								<a class="btn btn-primary textcolorb" href="25_p_insertar.html" role="button">Agregar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="26_p_eliminar.html" role="button">Eliminar</a>
							</div>
						</div>
						<br>
						<!-- RENGLON -->
						<div class="row justify-content-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="27_p_actualizar.html" role="button">Actualizar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="28_p_consultar.html" role="button">Consultar</a>
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
</body>
</html>