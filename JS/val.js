// VALIDACIONES

// LOGIN------------------------------------------------------------------------------------
function validarLogin(){
	var ema = document.getElementById("email").value;
	var pas = document.getElementById("pass").value;
	var emav = document.getElementById("email");
	var pasv = document.getElementById("pass");
	// var contra=contrasena.value;
	// var correo=correous.value;
	// var excorreo=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
	/*Aqui va a ir el código PHP que valida los datos y entra al sistema*/
	if((ema=="") || (pas=="")){
		alert("Se requiere que todos los campos esten llenos");
		emav.className = "form-control textcolorw is-invalid";
		pasv.className = "form-control textcolorw is-invalid";
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
				emav.value ="";
				pasv.value ="";
				// history.back();
				history.go(-1)
			}
		}
		else{
			alert("Formato de correo inválido, por favor verificalo");
			emav.className = "form-control textcolorw is-invalid";
		}
	}
}

// SIGN IN (REGISTRARSE)------------------------------------------------------------------------------------------
function validarSignin(){
	var nam = document.getElementById("nombre").value;
	var ap = document.getElementById("ap").value;
	var am = document.getElementById("am").value;
	// Ssexo
	var tel = document.getElementById("phone").value;
	var correo = document.getElementById("email").value;
	var contra = document.getElementById("pass1").value;
	var contrac = document.getElementById("passv").value;
	var tyc = document.getElementById("tyc");
	var regnom=/^([A-Za-z\sáéíóú]{2,15})+$/;
	var regap=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regam=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regcorreo=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
	var regtel=/^([0-9]{10})+$/;
	// variables para cambiar la clase de error
	var namv = document.getElementById("nombre");
	var apv = document.getElementById("ap");
	var amv = document.getElementById("am");
	// Ssexov
	var telv = document.getElementById("phone");
	var correov = document.getElementById("email");
	var contrav = document.getElementById("pass1");
	var contracv = document.getElementById("passv");
	
	// Si estan vacios:				
	if((nam=="") || (ap=="")  || (am=="") || (correo=="") || (tel=="") || (contra=="") || (contrac=="")){
		alert("Se requiere que todos los campos esten llenos");
		namv.className = "form-control textcolorw is-invalid";
		apv.className = "form-control textcolorw is-invalid";
		amv.className = "form-control textcolorw is-invalid";
		correov.className = "form-control textcolorw is-invalid";
		telv.className = "form-control textcolorw is-invalid";
		contrav.className = "form-control textcolorw is-invalid";
		contracv.className = "form-control textcolorw is-invalid";
	}
	else{//si no
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if(regnom.test(nam)){
			alert("NOMBRE CORRECTO");
			namv.className = "form-control textcolorw is-valid";
			if(regap.test(ap)){
				alert("apellido paterno CORRECTO");
				apv.className = "form-control textcolorw is-valid";
				if(regam.test(am)){
					alert("apellido materno CORRECTO");
					amv.className = "form-control textcolorw is-valid";
					if(regtel.test(tel)){
						alert("Telefono CORRECTO");
						correov.className = "form-control textcolorw is-valid";
						if(regcorreo.test(correo)){
							alert("email CORRECTO");
							telv.className = "form-control textcolorw is-valid";
							if(contra==contrac){
								contracv.className = "form-control textcolorw is-valid";
								contrav.className = "form-control textcolorw is-valid";
								if(tyc.checked){
									alert("REGISTRANDO");
									// document.getElementById("registro").submit();
									location.href="7_login_signin.html";
								}
								else{
									alert("Debes aceptar los términos y condiciones");
									tyc.className = " form-check-input is-invalid";
								}
							}
							else{
								alert("Las contraseñas no coinciden");
								contracv.className = "form-control textcolorw is-invalid";
							}
						}
						else{
							alert("Formato de email inválido,por favor verificalo");
							telv.className = "form-control textcolorw is-invalid";
						}
					}
					else{
						alert("Formato de telefono inválido,por favor verificalo");
						correov.className = "form-control textcolorw is-invalid";
					}
				}
				else{
					alert("Formato de apellido materno inválido,por favor verificalo");
					amv.className = "form-control textcolorw is-invalid";
				}
			}
			else{
				alert("Formato de apellido paterno inválido,por favor verificalo");
				apv.className = "form-control textcolorw is-invalid";
			}								
		}
		else{
			alert("Formato de NOMBRE inválido,por favor verificalo");
			namv.className = "form-control textcolorw is-invalid";
		}
	}
}

// TARJETA (PAGO) FALTA VALIDAD FECHAAAAAAA!!!!!!!--------------------------------------------------------------------------------------------------------

function carga(){
	// variables para cambiar clases
	var ntv = document.getElementById("ntarjeta");
	var nv = document.getElementById("nombre1");
	var expv = document.getElementById("expire");
	var numv = document.getElementById("num");
	var pago = document.getElementById("btpago");
	var pago = document.getElementById("btpago");
	var tienda = document.getElementById("tienda");
	var tarj = document.getElementById("tarjeta");


	tienda.checked=false;
	tarjeta.checked=false;
	// deshabilita campos
	ntv.disabled=true;
	nv.disabled=true;
	expv.disabled=true;
	num.disabled=true;
	// deshabilita boton
	pago.disabled=true;
	pago.className = "btn btn-primary shadow-lg disabled";
}

//pagar en tienda
function deshabilitar(){
// variables para cambiar clases
	var ntv = document.getElementById("ntarjeta");
	var nv = document.getElementById("nombre1");
	var expv = document.getElementById("expire");
	var numv = document.getElementById("num");
	var pago = document.getElementById("btpago");

	// deshabilita campos
	ntv.disabled=true;
	nv.disabled=true;
	expv.disabled=true;
	num.disabled=true;
	// habilita boton
	pago.disabled=false;
	pago.className = "btn btn-primary shadow-lg";
	

	// if (tienda.checked){
	// 	ntv.setAttribute("disabled", "");
	// 	nv.setAttribute("disabled", "");
	// 	expv.setAttribute("disabled", "");
	// 	num.setAttribute("disabled", "");
	// }

}

//pago con tarjeta
function habilitar(){
// variables para cambiar clases
	var ntv = document.getElementById("ntarjeta");
	var nv = document.getElementById("nombre1");
	var expv = document.getElementById("expire");
	var numv = document.getElementById("num");
	var pago = document.getElementById("btpago");

	// habilita campos
	ntv.disabled=false;
	nv.disabled=false;
	expv.disabled=false;
	num.disabled=false;
	// habilita boton
	pago.disabled=false;
	pago.className = "btn btn-primary shadow-lg";

}

// function fecha(){
// 	if(event.charCode >= 48 && event.charCode <= 57){

// 	}
// }

// //Date expire input
//   $(".expire").keypress(function(event){
//     if(event.charCode >= 48 && event.charCode <= 57){
//       if($(this).val().length === 1){
//           $(this).val($(this).val() + event.key + " / ");
//       }else if($(this).val().length === 0){
//         if(event.key == 1 || event.key == 0){
//           month = event.key;
//           return event.charCode;
//         }else{
//           $(this).val(0 + event.key + " / ");
//         }
//       }else if($(this).val().length > 2 && $(this).val().length < 9){
//         return event.charCode;
//       }
//     }
//     return false;
//   }).keyup(function(event){
//     $(".date_value").html($(this).val());
//     if(event.keyCode == 8 && $(".expire").val().length == 4){
//       $(this).val(month);
//     }
    
//     if($(this).val().length === 0){
//       $(".date_value").text("MM / YYYY");
//     }
//   }).keydown(function(){
//     $(".date_value").html($(this).val());
//   }).focus(function(){
//     $(".date_value").css("color", "white");
//   });

	
function validarPago(){
	var tienda = document.getElementById("tienda");
	var tarj = document.getElementById("tarjeta");
	var nt = document.getElementById("ntarjeta").value;
	var n = document.getElementById("nombre1").value;
	var exp = document.getElementById("expire").value;
	var cve = document.getElementById("num").value;
	// variables para cambiar clases
	var ntv = document.getElementById("ntarjeta");
	var nv = document.getElementById("nombre1");
	var expv = document.getElementById("expire");
	var cvev = document.getElementById("num");
	var pago = document.getElementById("btpago");

	var regnom=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regnt=/^([0-9]{16})+$/;
	var regcve=/^([0-9]{4})+$/;


	if (tienda.checked){
		location.href="7_login_signin.html";
	}
	else{
		if((nt=="") || (cve=="") ){
			alert("TODOS LOS CAMPOS SON REQUERIDOS");
			ntv.className = "form-control is-invalid";
			nv.className = "form-control textcolorw is-invalid";
			expv.className = "form-control textcolorw is-invalid";
			cvev.className = "form-control textcolorw is-invalid";
		}
		else{
			/*VALIDA QUE EL formato de correo SEA VALIDO*/
			if(regnt.test(nt)){
				alert("TARJETA CORRECTO");
				ntv.className = "form-control textcolorw is-valid";
				if (regnom.test(n)){
					alert("NOMBRE CORRECTO");
					nv.className = "form-control textcolorw is-valid";
					if(regcve.test(cve)){
						alert("CLAVE CORRECTO");
						cvev.className = "form-control textcolorw is-valid";
						alert("Realizando pedido");
						// document.getElementById("rpedido").submit();
						//location.href="categorias.html";
					}
					else{
						alert("Formato de CLAVE inválido, por favor verificalo");
						cvev.className = "form-control textcolorw is-invalid";
					}
				}
				else{
					alert("Formato de Nombre inválido, por favor verificalo");
					nv.className = "form-control textcolorw is-invalid";
				}								
			}
			else{
				alert("Formato de TARJETA inválido, por favor verificalo");
				nvt.className = "form-control textcolorw is-valid";
			}
		}
	}
}
