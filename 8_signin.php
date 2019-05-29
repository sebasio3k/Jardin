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
	<title>Signin</title>
	<link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Alertify -->
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/themes/default.css">
	<script src="./alertifyjs/alertify.js"></script>
	<!-- sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
	<!-- ICONO EN LA PESTAÑA -->
	<link rel="shortcur icon" href=".\img\icon.png">
	<!-- captcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body class="mibody2">
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

				<div class="navbar-collapse collapse" id="navbarColor01">
					<ul class="navbar-nav mr-auto">
						<!-- Opciones -->
						<li class="nav-item rounded">
							<a class="nav-link" href="1_index.php">Inicio</a>
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
						<li class="nav-item rounded">
							<a class="nav-link" href="7_login_signin.php">Iniciar Sesión</a>
						</li>
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!-- Barra Busqueda  -->
					<form class="form-inline`justify-content-center">
						<input class="form-control mr-sm-2" type="search" placeholder="¿Buscas algo?" aria-label="Search" id="inputBusqueda" >
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
	<div class="container pad">
		<!-- RENGLON -->
	 	<div class="row justify-content-center">
			<div class="col-xs-12 align-self-center">
				<!-- Titulo Iniciar Sesion-->
				<h1 class="titulo text-center b">Registro</h1><br>
				<h2 class="titulo text-center b">Crear Cuenta</h2>
			</div>
		</div>
		<br>
		<!-- Formulario Registro ./php/procesa.php -->
		<form id="formRegistro" method="post" role="form">
			<!-- NOMBRE -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="exampleInputEmail1" class="textcolorw">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required=”required”>
				</div>
			</div>
			<!-- AP -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="exampleInputEmail1" class="textcolorw">Apellido paterno</label>
					<input type="text" class="form-control" id="ap" name="ap" placeholder="Tu Apellido Paterno" required=”required”>
				</div>
			</div>
			<!-- AM -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="exampleInputEmail1" class="textcolorw">Apellido materno</label>
					<input type="text" class="form-control" id="am" name="am" placeholder="Tu Apellido Materno" required=”required”>
				</div>
			</div>
			<!-- SEXO -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4 align-self-center text-center">
					<label for="exampleInputEmail1" class="textcolorw text-center">Sexo</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sexo" id="rmujer" value="Mujer">
						<label class="form-check-label textcolorw" for="gridRadios1">
							Mujer
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-check-input" type="radio" name="sexo" id="rhombre" value="Hombre">
						<label class="form-check-label textcolorw" for="gridRadios2">
							Hombre
						</label>
					</div>
				</div>
			</div>
			<!-- TELEFONO -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="exampleInputEmail1" class="textcolorw">Tel&eacute;fono</label>
					<input id="phone" name="phone" type="text" placeholder="888 888 88 88" class="form-control">
				</div>
			</div>
			<!-- EMAIL -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4">
					<label for="exampleInputEmail1" class="textcolorw">Email</label>
					<input type="email" class="form-control textcolorw" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" >
					<small id="emailHelp" class="form-text text-muted ">*Tu correo electrónico será tu usuario para acceder a tu cuenta</small>
				</div>
			</div>
			<!-- PASSWORD -->
			<div class="row justify-content-center">
				<div class="form-group justify-content-center  col-xs-12 col-4">
					<label for="exampleInputPassword1 " class="textcolorw">Contrase&ntilde;a</label>
					<input type="password" class="form-control" id="pass1" name="pass1"  placeholder="Password" aria-describedby="passwordHelpBlock" >
					<small id="passwordHelpBlock" class="form-text text-muted ">
  						Tu contraseña debe ser de m&iacute;nimo 8 caracteres de longitud, debe contener al menos 1 letra y 1 n&uacute;mero, no debe contener espacios, caracteres especiales, o emoji.
					</small>
				</div>
			</div>
			<!-- PASSWORD VERIFICATION -->
			<div class="row justify-content-center">
				<div class="form-group justify-content-center  col-xs-12 col-4">
					<label for="exampleInputPassword1 " class="textcolorw">Verificar Contrase&ntilde;a</label>
					<input type="password" class="form-control" id="passv" name="passv" placeholder="Password" >
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group">
					<div class="form-check">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Sí, quiero recibir promociones exclusivas, tips e ideas para mejorar mi hogar.</label>
						</div>
						<!-- <input class="form-check-input" type="checkbox" id="prom">
						<label class="form-check-label textcolorw" for="gridCheck">
							Sí, quiero recibir promociones exclusivas, tips e ideas para mejorar mi hogar.
						</label> -->
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="tyc" required onmouseout=validarSignin();>
						<label class="form-check-label textcolorw" for="gridCheck">
							He leído y acepto los <a class="colorbg" href="" data-toggle='modal' data-target='#exampleModal'>Términos y Condiciones y Aviso de privacidad.</a>
						</label>
					</div>
				</div>
			</div>
			<!-- RENGLON CAPTCHA-->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 align-self-center text-center">
					<div class="g-recaptcha" data-sitekey="6LcMBaQUAAAAADhJNjszatqBfSQRPbK-ikDpkFNM" ></div>
				</div>
			</div>
			<!-- BOTONES -->
			<div class="row justify-content-center">
				<div class="form-group col-xs-12 col-4 align-self-center text-center">
					<a class="btn btn-primary textcolorb" role="button" href="1_index.php">Cancelar</a>
					<!-- <button type="submit" class="btn btn-primary" >Cancelar</button> -->
				</div>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="form-group col-xs-12 col-4 align-self-center text-center">
					<input  id="btnregistro" type="button" value="Registrarme" class=" btn btn-primary shadow-lg" >
					<!-- onclick=validarSignin(); -->
					<!-- onmouseenter=validarSignin(); -->
					<!-- <button id="registro" type="submit" class="btn btn-primary " onclick=validarRegistro();>Registrarme</button> -->
				</div>
			</div>
		</form>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title b" id="exampleModalLabel">TERMINOS Y CONDICIONES</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<div class="modal-body">
					<div class="row justify-content-center">
						<div class="col text-center justify-content-center">
							<p class="text-center b">POLÍTICA DE PRIVACIDAD</p>
							<p class="pp text-justify">
							El presente Política de Privacidad establece los términos en que usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
							</p>
							<p class="text-center b">Información que es recogida</p>
							<p class="pp text-justify">
							Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.
							</p>
							<p class="text-center b">Uso de la información recogida</p>
							<p class="pp text-justify">
							Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.
							</p>
							<p>
							está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.
							</p>
							<p class="text-center b">Cookies</p>
							<p class="pp text-justify">
							Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.
							</p>
							<p class="pp text-justify">
							Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
							</p>
							<p class="text-center b">Enlaces a Terceros</p>
							<p class="pp text-justify">
							Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.
							</p>
							<p class="text-center b">Control de su información personal</p>
							<p class="pp text-justify">
							En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.
							</p>
							<p class="pp text-justify">
							Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.
							</p>
							<p class="pp text-justify">
							Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
							</p>
							<small id="passwordHelpBlock" class="form-text text-muted">
							Estas terminos y condiciones se han generado en plantillaterminosycondicionestiendaonline.com.
							</small>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No acepto</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">De acuerdo</button>
				</div>
				</div>
			</div>
		</div>


	</div>
		<br>
		<br>
		<hr>
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

	 <!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script> -->
<!--<script src=".\JS\validator.js"></script>
    <script src=".\JS\contact.js"></script> -->
	<!-- Captcha -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

<!-- <script>

$('#registro').on('mouseover', function() {
	if ($('#g-recaptcha-response').val()==""){
		console.log("vacio");
	}
	else{
		console.log($('#g-recaptcha-response').val());
	}
});

	function alerta(n){
		if(n==1){
			swal("CAPTCHA VERIFICADO");
		}
		if (n==2){
			swal("CAPTCHA SIN VERIFICAR");
		}
	}
</script> -->
</body>
</html>

<script>

	$(document).ready(function(){

		$('#btnregistro').on('click', function() {
			var val=validarSignin();
			if(val){
				var res =  $('#g-recaptcha-response').val();
				console.log(res);
				// if ($('#g-recaptcha-response').val()==""){
				if(res==""){
					console.log("vacio");
					swal("Oops" ,"CAPTCHA SIN VERIFICAR", "error");
				}
				else{
					$.ajax({
						url: "php/procesa.php",
						type: 'POST',
						// dataType: 'json',
						data:res,
						// data: {
						// 	// 'foo': foo,
						// 	'response': grecaptcha.getResponse()
						// },
						success: function() {
							// registro
							// alertify.alert("Captcha confirmado");
							// swal("Bien", "CAPTCHA CONFIRMADO", "success");
							if($('#nombre').val()=="" ){
								alertify.alert("Debes agregar el nombre");
								return false;
							}else if($('#ap').val()==""){
								alertify.alert("Debes agregar el apellido paterno");
								return false;
							}else if($('#am').val()==""){
								alertify.alert("Debes agregar el apellido materno");
								return false;
							}else if($('input[name=sexo]:checked').val()==""){
								alertify.alert("Debes seleccionar el sexo");
								return false;
							}else if($('#phone').val()==""){
								alertify.alert("Debes agregar el telefono");
								return false;
							}else if($('#email').val()==""){
								alertify.alert("Debes agregar el email");
								return false;
							}else if($('#passv').val()==""){
								alertify.alert("Debes agregar el password");
								return false;
							}

							// forma cadena para enviar datos de registro
							var cadena="nombre=" + $('#nombre').val() +
								"&ap=" + $('#ap').val() +
								"&am=" + $('#am').val() +
								"&sex=" + $('input[name=sexo]:checked').val() +
								"&phone=" + $('#phone').val() +
								"&usuario=" + $('#email').val() +
								"&password=" + $('#passv').val() ;
								// "&";
									// console.log(cadena);
							$.ajax({
								type:"POST",
								url:"php/registro.php",
								data:cadena,
								success:function(r){
									if(r==2){
										alertify.alert("ATENCION","Este usuario ya existe, prueba con otro correo",
										function(){
											alertify.error('Prueba otro');
										});
									}
									else if(r==1){
										$('#formRegistro')[0].reset();
										alertify.confirm('Mensaje', 'Usuario Registrado con exito',
										function(){
											alertify.success('IniciarSesion');
											location.href="7_login_signin.php";
										},
										function(){
											alertify.error('Cancel');
										});
									}
									else{
										alertify.alert("Error al Registrar");
									}
									console.log(r);
								}
							});
						}
					});
				}
				// return false;
			}
			else{
				// swal("Oops" ,"VERIFICA LOS CAMPOPS", "error");
			}
		});
	});

</script>
