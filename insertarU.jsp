<%@ page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*" errorPage="" %>
<%@ include file="Connections/conmysqljardin.jsp" %>
<%
// *** Edit Operations: declare variables

// set the form action variable
String MM_editAction = request.getRequestURI();
if (request.getQueryString() != null && request.getQueryString().length() > 0) {
  String queryString = request.getQueryString();
  String tempStr = "";
  for (int i=0; i < queryString.length(); i++) {
    if (queryString.charAt(i) == '<') tempStr = tempStr + "&lt;";
    else if (queryString.charAt(i) == '>') tempStr = tempStr + "&gt;";
    else if (queryString.charAt(i) == '"') tempStr = tempStr +  "&quot;";
    else tempStr = tempStr + queryString.charAt(i);
  }
  MM_editAction += "?" + tempStr;
}

// connection information
String MM_editDriver = null, MM_editConnection = null, MM_editUserName = null, MM_editPassword = null;

// redirect information
String MM_editRedirectUrl = null;

// query string to execute
StringBuffer MM_editQuery = null;

// boolean to abort record edit
boolean MM_abortEdit = false;

// table information
String MM_editTable = null, MM_editColumn = null, MM_recordId = null;

// form field information
String[] MM_fields = null, MM_columns = null;
%>
<%
// *** Insert Record: set variables

if (request.getParameter("MM_insert") != null && request.getParameter("MM_insert").toString().equals("form1")) {

  MM_editDriver     = MM_conmysqljardin_DRIVER;
  MM_editConnection = MM_conmysqljardin_STRING;
  MM_editUserName   = MM_conmysqljardin_USERNAME;
  MM_editPassword   = MM_conmysqljardin_PASSWORD;
  MM_editTable  = "usuarios";
  MM_editRedirectUrl = "";
  String MM_fieldsStr = "nombre|value|apaterno|value|amaterno|value|sexo|value|telefono|value|email|value|password|value";
  String MM_columnsStr = "nombre|',none,''|apaterno|',none,''|amaterno|',none,''|sexo|',none,''|telefono|none,none,NULL|email|',none,''|password|',none,''";

  // create the MM_fields and MM_columns arrays
  java.util.StringTokenizer tokens = new java.util.StringTokenizer(MM_fieldsStr,"|");
  MM_fields = new String[tokens.countTokens()];
  for (int i=0; tokens.hasMoreTokens(); i++) MM_fields[i] = tokens.nextToken();

  tokens = new java.util.StringTokenizer(MM_columnsStr,"|");
  MM_columns = new String[tokens.countTokens()];
  for (int i=0; tokens.hasMoreTokens(); i++) MM_columns[i] = tokens.nextToken();

  // set the form values
  for (int i=0; i+1 < MM_fields.length; i+=2) {
    MM_fields[i+1] = ((request.getParameter(MM_fields[i])!=null)?(String)request.getParameter(MM_fields[i]):"");
  }
 
  // append the query string to the redirect URL
  if (MM_editRedirectUrl.length() != 0 && request.getQueryString() != null) {
    MM_editRedirectUrl += ((MM_editRedirectUrl.indexOf('?') == -1)?"?":"&") + request.getQueryString();
  }
}
%>
<%
// *** Insert Record: construct a sql insert statement and execute it

if (request.getParameter("MM_insert") != null) {

  // create the insert sql statement
  StringBuffer MM_tableValues = new StringBuffer(), MM_dbValues = new StringBuffer();
  for (int i=0; i+1 < MM_fields.length; i+=2) {
    String formVal = MM_fields[i+1];
    String elem;
    java.util.StringTokenizer tokens = new java.util.StringTokenizer(MM_columns[i+1],",");
    String delim    = ((elem = (String)tokens.nextToken()) != null && elem.compareTo("none")!=0)?elem:"";
    String altVal   = ((elem = (String)tokens.nextToken()) != null && elem.compareTo("none")!=0)?elem:"";
    String emptyVal = ((elem = (String)tokens.nextToken()) != null && elem.compareTo("none")!=0)?elem:"";
    if (formVal.length() == 0) {
      formVal = emptyVal;
    } else {
      if (altVal.length() != 0) {
        formVal = altVal;
      } else if (delim.compareTo("'") == 0) {  // escape quotes
        StringBuffer escQuotes = new StringBuffer(formVal);
        for (int j=0; j < escQuotes.length(); j++)
          if (escQuotes.charAt(j) == '\'') escQuotes.insert(j++,'\'');
        formVal = "'" + escQuotes + "'";
      } else {
        formVal = delim + formVal + delim;
      }
    }
    MM_tableValues.append((i!=0)?",":"").append(MM_columns[i]);
    MM_dbValues.append((i!=0)?",":"").append(formVal);
  }
  MM_editQuery = new StringBuffer("insert into " + MM_editTable);
  MM_editQuery.append(" (").append(MM_tableValues.toString()).append(") values (");
  MM_editQuery.append(MM_dbValues.toString()).append(")");
  
  if (!MM_abortEdit) {
    // finish the sql and execute it
    Driver MM_driver = (Driver)Class.forName(MM_editDriver).newInstance();
    Connection MM_connection = DriverManager.getConnection(MM_editConnection,MM_editUserName,MM_editPassword);
    PreparedStatement MM_editStatement = MM_connection.prepareStatement(MM_editQuery.toString());
    MM_editStatement.executeUpdate();
    MM_connection.close();

    // redirect with URL parameters
    if (MM_editRedirectUrl.length() != 0) {
      response.sendRedirect(response.encodeRedirectURL(MM_editRedirectUrl));
      return;
    }
  }
}
%>



<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset =	"UTF-8">
	<title>U - Insertar</title>
	
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=	"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Alertify -->
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./alertifyjs/css/themes/default.css">
	<script src="./alertifyjs/alertify.js"></script>
	<!-- sweetalert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href="estilos2.css">
	<!-- ICONO EN LA PESTAÑA -->
	<link rel="shortcur icon" href="icon.png">
</head>

<body class="adminbody">
<!-- HEADER -->
	<header class="container-fluid">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<a class="navbar-brand " href="13_admin_index.php">
					<!-- logo -->
					<img src="logo.png" class="img-fluid " alt="Responsive image" width="60" height="60">El Jard&iacute;n de la Abuela  A D M I N I S T R A D O R  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle=" collapse" data-target=" #navbarColor01" aria-controls= "navbarColor01" aria-expanded= "false" aria-label= "Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="navbar-collapse collapse" id="navbarColor01" style="">
					<!-- Barra Busqueda  -->
					<form class="form-inline justify-content-center" id="barra_bus" name="barra_bus">
						<input class="form-control mr-sm-2" type= "search" placeholder= "Search" aria-label= "Search" id="inputBusqueda" onBlur=foco();>
						<!-- <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button> -->
					</form>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<ul class="navbar-nav mr-auto">
						<li>
							<!-- Cerrar Sesion -->
							<a class="nav-link" href="7_login_signin.php">Cerrar Sesi&oacute;n</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- CONTENEDOR PARA MOSTRAR RESULTADO DE BUSQUEDA -->
		<div class="container">
			<div class="search" id="search">
				<table class="search-table" id="searchTable" name= "searchTable">
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
							<td><a href="insertarU.jsp">Insertar Usuario</a></td>
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
							<td><a href="insertarC.jsp">Insertar Curso</a></td>
						</tr>
						<tr>
							<td><a href="21_c_eliminar.js">Eliminar Curso</a></td>
						</tr>
						<tr>
							<td><a href="23_c_consultar.php">Consultar Curso</a></td>
						</tr>
						<tr>
							<td><a href="22_c_actualizar.php">Actualizar Curso</a></td>
						</tr>
						<tr>
							<td><a href="insertarP.jsp">Insertar Producto</a></td>
						</tr>
						<tr>
							<td><a href="26_p_eliminar.php">Eliminar Producto</a></td>
						</tr>
						<tr>
							<td><a href="28_p_consultar.php">Consultar Producto</a></td>
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
							<form method="post" action="<%=MM_editAction%>" name="form1">
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Nombre</label>
									<!-- <div class=" col-xs-12 col-4"> -->
									<div class="col-sm-4 ">
										<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Tu nombre" required="required" onblur=validarNombre();>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Apellido paterno</label>
									<div class="col-sm-4 ">
										<input type="text" class="form-control" name="apaterno" id="apaterno" placeholder="Apellido Paterno" required="required" onblur=validarAp>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Apellido materno</label>
									<div class="col-sm-4 ">
										<input type="text" class="form-control" name="amaterno" id="amaterno" placeholder="Apellido Materno" required="required" onblur=validarAm>
									</div>
								</div>
								<!-- SEXO -->
								<div class="row form-group justify-content-center">
									<div class="form-group  text-center justify-content-center">
										<label for="exampleInputEmail1" class="textcolorB text-center">Sexo</label>
										<div class="form-check ">
											<input class="form-check-input" type="radio" name="sexo" id="rmujer" value="Mujer" checked>
											<label class="form-check-label b" for="gridRadios1">Mujer</label>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="form-check-input" type="radio" name="sexo" id="rhombre" value="Hombre">
											<label class="form-check-label b" for="gridRadios2">Hombre</label>
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
										<input id="telefono" name="telefono" type="text" placeholder="Phone" class="form-control" onblur=validarTel>
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputEmail1" class="col-sm-2 col-form-label textcolorB">Email</label>
									<div class="col-sm-4 ">
										<input type="email" class="form-control textcolorw" name="email" id="email" placeholder="Enter email" >
									</div>
								</div>
								<!-- RENGLON -->
								<div class="row form-group justify-content-center">
									<label for="exampleInputPassword1 " class="col-sm-2 col-form-label textcolorB">Contrase&ntilde;a</label>
									<div class="col-sm-4 ">
										<input type="password" class="form-control" name="password" id="password" placeholder="Password">
									</div>
								</div>
								<!-- RENGLON -->
								<!-- <div class="row justify-content-center">
									<div class="form-group justify-content-center  col-xs-12 col-4">
										<label for="exampleInputPassword1 " class="textcolorw">Verificar Contrase&ntilde;a</label>
										<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
									</div>
								</div> -->
								<!-- BOTON -->
								<div class="row justify-content-center">
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<input type="submit" class="btn btn-primary shadow-lg"  value="Insertar Usuario" onclick=v();>
									</div>
								</div>
								<!-- esto venia generado checar! -->
								<div class="row justify-content-center">
									<div class="form-group col-xs-12 col-4 align-self-center text-center">
										<input type="hidden" name="MM_insert" value="form1">
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
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
							<br>
							<div class="row justify-content-center text-center">
								<div class="col-xs-12 col-4 align-self-center text-center">
									<a class="btn btn-primary shadow-lg" href="14_a_usuarios.php" role="button">Regresar a Opciones Usuario</a>
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
								<a class="btn btn-primary textcolorb" href="insertarC.jsp" role="button">Agregar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="21_c_eliminar.php" role="button">Eliminar</a>
							</div>
						</div>
						<br>
						<!-- RENGLON -->
						<div class="row justify-content-center">
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="22_c_actualizar.php" role="button">Actualizar</a>
							</div>
							<div class="col-xs-12 col-4 align-self-center text-center">
								<a class="btn btn-primary textcolorb" href="23_c_consultar.php" role="button">Consultar</a>
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
								<a class="btn btn-primary textcolorb" href="insertarP.jsp" role="button">Agregar</a>
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
						2019. Todos los derechos reservados. Aviso de privacidad. Pol&iacute;ticas de devolucien. <br>
						El uso de este sitio este sujeto a ciertos t&eacute;rminos de uso que requieren un acuerdo legal entre Usted y El Jar&iacute;n de la Abuela. Esta aplicaci&oacute;n web es con fines acad&eacute;micos.
					</p>
				</div>
			</div>
		</div>	
	</footer>

	
		<!-- Scripts Bootstrap JQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=" sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin= "anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity= "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin= "anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity= "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin= "anonymous"></script>
	<script src="jquery.js"></script>
	<script src="jquery.dataTables.min.js"></script>
	<script src="buscador.js"></script>
	<!-- JavaScript -->
	<script type="text/javascript" src="val.js"></script>
</body>
</html>
