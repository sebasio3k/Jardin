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

	// CREAR VARIABLE DE SESION productos PARA UTILZIARLA DESPUES
	include_once 'php/conecta.php';
	$mysqli = conecta();
    $query = "SELECT idproducto,idcategoria,descripcion,precio FROM productos";
    // echo($query);
	$resultado = $mysqli->query($query);

    if($resultado -> num_rows > 0){
		if(!isset($_SESSION['productos'])){
			$n=0;
        	while($fila=$resultado->fetch_assoc()){
                $listap=array(
                    'idproducto'=>$fila['idproducto'],
                    'idcategoria'=>$fila['idcategoria'],
                    'descripcion'=>$fila['descripcion'],
                    'precio'=>$fila['precio']
                    // 'ruta'=>$fila['ruta']
                    // 'stock'=>$id,
                );
                $_SESSION['productos'][$n]=$listap;
                $n++;
            }
        }
	}

	// CREAR VARIABLE DE SESION cursos PARA UTILZIARLA DESPUES
	$query2 = "SELECT * FROM cursos";
    // echo($query);
	$resultado2 = $mysqli->query($query2);
    if($resultado2 -> num_rows > 0){
		if(!isset($_SESSION['cursos'])){
			$n2=0;
        	while($fila2=$resultado2->fetch_assoc()){
                $listac=array(
                    'idcurso'=>$fila2['idcurso'],
                    'nombrecurso'=>$fila2['nombrecurso'],
                    'descripcion'=>$fila2['descripcion'],
                    'precio'=>$fila2['precio'],
                    'fecha'=>$fila2['fecha']
                    // 'stock'=>$id,
                );
                $_SESSION['cursos'][$n2]=$listac;
                $n2++;
            }
        }
	}

	$mysqli->close();

	// CREAR VARIABLE DE SESION cuantos PARA CONTROL DE CANTIDAD CARRITO
	if(!isset($_SESSION['cuantos'])){
		$_SESSION['cuantos']=0;
	}
	else{
		$_SESSION['cuantos']=$_SESSION['cuantos'];
	}
	// $longitud=count($_SESSION['productos']);
	// print($longitud);
	// print_r($_SESSION['productos'][1]['precio']);



	include 'php/MetodosDAO.php';
    // $op=$_REQUEST['op'];

    // switch($op){
    //     case 1:
            // unset($_SESSION['lista']);
            // // MetodosDAO = listado
            // $objMetodo=new MetodosDAO();
            // $lista=$objMetodo->ListarProductos();
			// $_SESSION['lista']=$lista;
			// $lista_2 = $lista;
			// print_r ($lista_2['idproducto']);
			// print_r ($_SESSION['lista']);
            // header("location: ../4_productos2.php");
    //         break;
    //     case 2:
    //     break;
	// }

	// validar la variable de sesion de productos
	// if(!isset($_SESSION['carrito'])){
	// 	$producto=array(
	// 		'id'=>$id,
	// 		'id'=>$id,

	// 	);
	// }

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
	<script>
		// function ingresar(){
		// 	location.href="./php/tienda.php";
		// }
	</script>
</head>

<body class="mibody" ">
<!-- onload="ingresar()" -->
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

				<div class="navbar-collapse collapse " id="navbarColor01" style="">
					<ul class="navbar-nav mr-auto ul2 rounded">
						<!-- Opciones -->
						<li class="nav-item active rounded">
							<a class="nav-link " href="2_index_2.php">Inicio</a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link" href="3_nosotros2.php">Sobre Nosotros<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link"href="4_productos2.php">Productos</a>
						</li>
						<li class="nav-item rounded">
							<a class="nav-link" href="5_cursos2.php">Cursos</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="3_nosotros2.php">Contacto</a>
						</li> -->
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="¿Buscas algo?" aria-label="Search" id="inputBusqueda" >
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto ul2 ">
						<li class="rounded">
							<!-- Carrito -->
							<a class="nav-link" href="9_carrito.php">Carrito <img src="./img/car.png" class="img-fluid" alt="Responsive image" width="20" height="20">( <?php echo $_SESSION['cuantos'];?> )</a>
						</li>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- Example single danger button -->
					</ul>
					<!-- Dropdown MI CUENTA -->
					<ul class="navbar-nav mr-auto ">
						<li class="nav-item dropdown rounded">
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
							<td><a href="5_cursos2.php">Cursos</a></td>
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
	<!-- MAIN -->
	<div class="container">
		<br>
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
			        	<div class="carousel-caption d-none d-md-block blurb">
			          		<h5 class="w">LA MEJOR TIENDA DE JARDINERÍA</h5>
			          		<p class="w">Grandes art&iacute;culos que puedes encontrar</p>
			        	</div>
			      	</div>
			      	<div class="carousel-item">
			        	<img src="./img/2.jpg" class="d-block w-100" alt="...">
			      	</div>
			      	<div class="carousel-item">
			        	<img src="./img/3.png" class="d-block w-100" alt="...">
			        	<div class="carousel-caption d-none d-md-block blurb">
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
				<h1 class="titulo text-center ">El Jard&iacute;n De la Abuela</h1>
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
			<div class="content right  illustration_01 img-fluid blurw">
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
			<!-- <section class="separator">
 				<h3>Another Section Starts Here</h3>
			</section> -->
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
			<div class="content right illustration_04 img-fluid blurw">
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

</body>
</html>