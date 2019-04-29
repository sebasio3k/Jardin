
//
//Variables
//login
 var b1=false,b2=false;
//
//
//
//
//
//

//Funciones

	//LOGIN-----------------------------------------------------------------------------------
	//Funcion Email
	function validarLogin() {
		var ema = document.getElementById("email").value;
		var pas = document.getElementById("pass").value;
		//validar si estan vacios los campos
		if(ema == "" || pas == ""){
			alert("Se requiere que todos los campos esten llenos");
			document.getElementById("email").className = "form-control textcolorw is-invalid";
			document.getElementById("pass").className = "form-control textcolorw is-invalid";
		}
		else {
			//si campos correctos:
			if (b1==true && b2==true){
				//alert("Campos correctos");
				//valida usuario ejemplo
				if(ema=="bastianhdezo@gmail.com"){
					alert(ema + " Usuario correcto.");
					//valida usuario ejemplo
					if(pas=="1234"){
						alert(" Contraseña correcta.");
						document.getElementById("pass").className = "form-control textcolorw is-valid";
						window.open=("..\2_index_2.html");
					}
					else {
						alert("contraseña Incorrecta.");
					}
				}
				else {
					alert(ema + " Usuario Incorrecto.");
				}
				
			}
			else {
				//contraseña incorrecta
				if(b1==true && b2==false){
					alert("Tu contraseña es incorrecta.");	
				}
				else {
					//email incorrecto
					alert("La dirección de email es incorrecta.");
				}
			}
		}
	}
	//Validar Email y Contraseña
	function validarEmail() {
		var campo = document.getElementById("email").value;
		//validar que email cumpla con su estructura de mascara
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(campo)){
			alert("La dirección de email " + campo + " es correcta.");
			document.getElementById("email").className = "form-control textcolorw is-valid";
			b1=true;
		}
		else {
			alert("La dirección de email es incorrecta.");
			document.getElementById("email").className = "form-control textcolorw is-invalid";
			b1=false;
		}
	}
	//Contraseña
		function validarPass() {
		var campo = document.getElementById("pass").value;
		//valida que no este vacio el campo
		if(campo == ""){
			alert("Se requiere que escribas tu contraseña");
			document.getElementById("pass").className = "form-control is-invalid";
			b2=false;
		}
		else {		
			document.getElementById("pass").className = "form-control is-valid";
			b2=true;
		}
	}

//------------------------------------------------------------------------------------------------------
//Registro---------------------------------------------------------------------------------------------

	var bn=false, bap=false, bam=false, bt=false, bpas=false, bpasv=false, btyc=false; //b1 para email, 
	function validarNombre(){
		var n = document.getElementById("nombre").value;
		if(n==""){
			alert("Campo vacio");
		}
		else{
			if(/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/.test(n) && n.length<12){
				alert("Nombre correcto");
				document.getElementById("nombre").className = "form-control is-valid";
				bn=true;
			}
			else {
				alert("Nombre incorrecto");
				document.getElementById("nombre").className = "form-control is-invalid";
				bn=false;
			}
		}
	}
	function validarAp(){
		var ap = document.getElementById("ap").value;
		if(ap==""){
			alert("Campo vacio");
		}
		else{
			if(/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/.test(ap) && ap.length<12){
				alert("Apellido Paterno correcto");
				document.getElementById("ap").className = "form-control is-valid";
				bap=true;
			}
			else {
				alert("Apellido Paterno incorrecto");
				document.getElementById("ap").className = "form-control is-invalid";
				bap=false;
			}
		}
	}
	function validarAm(){
		var am = document.getElementById("am").value;
		if(am==""){
			alert("Campo vacio");
		}
		else{
			if(/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/.test(am) && am.length<12){
				alert("Apellido Materno correcto");
				document.getElementById("am").className = "form-control is-valid";
				bam=true;
			}
			else {
				alert("Apellido Materno incorrecto");
				document.getElementById("am").className = "form-control is-invalid";
				bam=false;
			}
		}
	}
	function validarTel(){
		var tel = document.getElementById("phone").value;
		if(tel==""){
			alert("Campo vacio");
		}
		else{
			if(/^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){2}\d{3}|(\d{2}[\*\.\-\s]){3}\d{2}|(\d{4}[\*\.\-\s]){1}\d{4})|\d{8}|\d{10}|\d{12}$/.test(tel) && tel.length<13){
				alert("Telefono correcto");
				document.getElementById("am").className = "form-control is-valid";
				bt=true;
			}
			else {
				alert("Telefono incorrecto");
				document.getElementById("am").className = "form-control is-invalid";
				bt=false;
			}
		}
	}
	function validarPass1(){
		var pass = document.getElementById("pass1").value;
		if(pass==""){
			alert("Campo vacio");
		}
		else{
			if(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(pass) && tel.length<=16 &&tel.length>=8){
				document.getElementById("pass1").className = "form-control is-valid";
				bpas=true;
			}
			else {
				alert("Telefono incorrecto");
				document.getElementById("pass1").className = "form-control is-invalid";
				bpas=false;
			}
		}

	}
	function validarPass2(){
		var pass2 = document.getElementById("passv").value;
		if(pass2==""){
			alert("Campo vacio");
		}
		else{
			if(document.getElementById("pass1") == document.getElementById("passv")){
				alert("Contraseña coincide");
				document.getElementById("passv").className = "form-control is-valid";
				bpasv=true;
			}
			else {
				alert("Contraseña No coincide");
				document.getElementById("passv").className = "form-control is-invalid";
				bpasv=false;
			}
		}
	}

	function validarRegistro(){
		var n = document.getElementById("nombre").value;
		var ap = document.getElementById("ap").value;
		var am = document.getElementById("am").value;
		var tel = document.getElementById("phone").value;
		var pass = document.getElementById("pass1").value;

		if(n=="" || ap=="" || am=="" || tel=="" || pass==""){
			alert("Se requiere el llenado de todos los campos");
		}
		else{
			if(bn==true && bap==true && bam==true && bt==true && b1==true && bpas==true && bpasv==true && btyc==true && document.getElementById("tyc").checked){
				alert("Datos Correctos");
				//insertar registro
			}
			else{
				alert("Se requiere el llenado de todos los campos");
			}
		}
	}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------
	function validarCamp(){
		var n = document.getElementById("nombre").value;
		var ap = document.getElementById("ap").value;
		var am = document.getElementById("am").value;
		var tel = document.getElementById("phone").value;
		var pass = document.getElementById("pass1").value;

		if(n=="" || ap=="" || am=="" || tel=="" || pass==""){
			alert("Se requiere el llenado de todos los campos");
		}
		else{
			if(bn==true && bap==true && bam==true && bt==true && b1==true && b2==true && btyc==true){
				alert("Datos Correctos");
				//insertar registro
			}
			else{
				alert("Se requiere el llenado de todos los campos");
			}
		}
	}

//


  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };

// Barra de busqueda ----------------------------------------------------------------


// Funciones para las tabs del administrador -----------------------------------------------------------
