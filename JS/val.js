// VALIDACIONES

// LOGIN------------------------------------------------------------------------------------
function validarLogin(){
	var ema = document.getElementById("email").value;
	var pas = document.getElementById("pass").value;
	// var contra=contrasena.value;
	// var correo=correous.value;
	// var excorreo=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
	/*Aqui va a ir el código PHP que valida los datos y entra al sistema*/
	if((ema=="") || (pas=="")){
		alert("Se requiere que todos los campos esten llenos");
	}
	else{
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(ema)){
			alert("CORREO CORRECTO");
			if((ema=="bastianhdezo@gmail.com") && (pas=="1234")){
				/*document.form.submit();*/
				location.href="2_index_2.html";
			}
			else{
				alert("CONTRASEÑA Y/O USUARIO INCORRECTO(S)");
				ema.className = "form-control textcolorw is-valid";
				pas.className = "form-control is-valid";
				history.back();
			}
		}
		else{
			alert("Formato de correo inválido, por favor verificalo");
			ema.className = "form-control textcolorw is-invalid";
		}
	}
}

// SIGN IN (REGISTRARSE)------------------------------------------------------------------------------------------
