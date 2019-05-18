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
		alertify.alert('Campos Requeridos', 'Se requiere que todos los campos esten llenos!', function(){ alertify.error('Verifica campos'); });
		emav.className = "form-control textcolorw is-invalid";
		pasv.className = "form-control textcolorw is-invalid";
	}
	else{
		/*VALIDA QUE EL formato de ema SEA VALIDO*/
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(ema)){
			emav.className = "form-control textcolorw is-valid";
			if (/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(pas)){
				pasv.className = "form-control textcolorw is-valid";
			}
			else{
				alertify.alert('Alerta', 'Formato de Contaseña inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
				pasv.className = "form-control textcolorw is-invalid";
			}
			// alert("ema CORRECTO");
			// if((ema=="bastianhdezo@gmail.com") && (pas=="1234")){
			// 	/*document.form.submit();*/
			// 	location.href="2_index_2.html";
			// }
			// else{
			// 	alertify.alert('Alerta', 'CONTRASEÑA Y/O USUARIO INCORRECTO(S)', function(){ alertify.error('Verifica campos'); });
			// 	emav.value ="";
			// 	pasv.value ="";
			// 	// history.back();
			// 	// history.go(-1)
			// }
		}
		else{
			alertify.alert('Alerta', 'Formato de correo inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
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
	// variables para cambiar la clase de error
	var namv = document.getElementById("nombre");
	var apv = document.getElementById("ap");
	var amv = document.getElementById("am");
	// Ssexov
	var sexv = document.getElementsByName("sexo");
	var telv = document.getElementById("phone");
	var correov = document.getElementById("email");
	var contrav = document.getElementById("pass1");
	var contracv = document.getElementById("passv");

	var regnom=/^([A-Za-z\sáéíóú]{2,15})+$/;
	var regap=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regam=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regcorreo=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
	var regtel=/^([0-9]{10})+$/;
	var regcontra=/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

	// Si estan vacios:
	if((nam=="") || (ap=="")  || (am=="") || (correo=="") || (tel=="") || (contra=="") || (contrac=="")){
		alertify.alert('Alerta', 'Se requiere que todos los campos esten llenos', function(){ alertify.error('Verifica campos'); });
		namv.className = "form-control textcolorw is-invalid";
		apv.className = "form-control textcolorw is-invalid";
		amv.className = "form-control textcolorw is-invalid";
		correov.className = "form-control textcolorw is-invalid";
		telv.className = "form-control textcolorw is-invalid";
		contrav.className = "form-control textcolorw is-invalid";
		contracv.className = "form-control textcolorw is-invalid";
		return false;
	}
	else{//si no
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if(regnom.test(nam)){
			namv.className = "form-control textcolorw is-valid";
			if(regap.test(ap)){
				apv.className = "form-control textcolorw is-valid";
				if(regam.test(am)){
					amv.className = "form-control textcolorw is-valid";
					// if (('input[name=sexo]:radio').is(':checked')){
					// if (('input[name=sexo]:checked').val()==""){
					if($("#formRegistro input[name='sexo']:radio").is(':checked')){
						if(regtel.test(tel)){
							telv.className = "form-control textcolorw is-valid";
							if(regcorreo.test(correo)){
								correov.className = "form-control textcolorw is-valid";
								if(regcontra.test(contra)){
									contrav.className = "form-control textcolorw is-valid";
									if(contra==contrac){
										contracv.className = "form-control textcolorw is-valid";
										contrav.className = "form-control textcolorw is-valid";
										if(tyc.checked){
											return true;


										// alert("REGISTRANDO");
										// // document.getElementById("registro").submit();
										// location.href="7_login_signin.html";
										}
										else{
											alertify.alert('Alerta', 'Debes aceptar los términos y condiciones', function(){ alertify.error('Verifica campos'); });
											tyc.className = " form-check-input is-invalid";
											return false;
										}
									}
									else {
										alertify.alert('Alerta', 'Las contraseñas no coinciden', function(){ alertify.error('Verifica campos'); });
										contracv.className = "form-control textcolorw is-invalid";
										return false;
									}
								}
								else{
									alertify.alert('Alerta', 'Formato de contraseña inválido, por favor verifícalo', function(){ alertify.error('Verifica campos'); });
									contra.className = "form-control textcolorw is-invalid";
									return false;
								}
							}
							else{
								alertify.alert('Alerta', 'Formato de email inválido, por favor verificalo, por favor verifícalo', function(){ alertify.error('Verifica campos'); });
								correov.className = "form-control textcolorw is-invalid";
								return false;
							}
						}
						else{
							alertify.alert('Alerta', 'Formato de telefono inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
							telv.className = "form-control textcolorw is-invalid";
							return false;
						}

					}
					else{
						alertify.alert('Alerta', 'Selecciona el sexo por favor', function(){ alertify.error('Verifica campos'); });
						sexv.className = "form-control textcolorw is-invalid";
						return false;
					}
				}
				else{
					alertify.alert('Alerta', 'Formato de apellido materno inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
					amv.className = "form-control textcolorw is-invalid";
					return false;
				}
			}
			else{
				alertify.alert('Alerta', 'Formato de apellido paterno inválido,por favor verificalo', function(){ alertify.error('Verifica campos'); });
				apv.className = "form-control textcolorw is-invalid";
				return false;
			}
		}
		else{
			alertify.alert('Alerta', 'Formato de NOMBRE inválido,por favor verificalo', function(){ alertify.error('Verifica campos'); });
			namv.className = "form-control textcolorw is-invalid";
			return false;
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

// ACTUALIZAR USUARIO------------------------------------------------------------------------------------------
function validarActualizar(){
	var nam = document.getElementById("nombre").value;
	var ap = document.getElementById("ap").value;
	var am = document.getElementById("am").value;
	// Ssexo
	var tel = document.getElementById("phone").value;
	var correo = document.getElementById("email").value;
	var contrac = document.getElementById("passv").value;
	var tyc = document.getElementById("tyc");
	// variables para cambiar la clase de error
	var namv = document.getElementById("nombre");
	var apv = document.getElementById("ap");
	var amv = document.getElementById("am");
	// Ssexov
	var sexv = document.getElementsByName("sexo");
	var telv = document.getElementById("phone");
	var correov = document.getElementById("email");
	var contracv = document.getElementById("passv");

	var regnom=/^([A-Za-z\sáéíóú]{2,15})+$/;
	var regap=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regam=/^([A-Za-z\sáéíóú]{2,30})+$/;
	var regcorreo=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
	var regtel=/^([0-9]{10})+$/;
	var regcontra=/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

	// Si estan vacios:
	if((nam=="") || (ap=="")  || (am=="") || (correo=="") || (tel=="") || (contrac=="")){
		alertify.alert('Alerta', 'Se requiere que todos los campos esten llenos', function(){ alertify.error('Verifica campos'); });
		namv.className = "form-control  is-invalid";
		apv.className = "form-control  is-invalid";
		amv.className = "form-control  is-invalid";
		correov.className = "form-control is-invalid";
		telv.className = "form-control  is-invalid";
		contracv.className = "form-control is-invalid";
		return false;
	}
	else{//si no
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if(regnom.test(nam)){
			namv.className = "form-control textcolorw is-valid";
			if(regap.test(ap)){
				apv.className = "form-control textcolorw is-valid";
				if(regam.test(am)){
					amv.className = "form-control textcolorw is-valid";
					// if (('input[name=sexo]:radio').is(':checked')){
					// if (('input[name=sexo]:checked').val()==""){
					if($("#formRegistro input[name='sexo']:radio").is(':checked')){
						if(regtel.test(tel)){
							telv.className = "form-control textcolorw is-valid";
							if(regcorreo.test(correo)){
								correov.className = "form-control textcolorw is-valid";
								if(regcontra.test(contra)){
									contracv.className = "form-control textcolorw is-valid";
									contrav.className = "form-control textcolorw is-valid";
									if(tyc.checked){
										return true;
										// alert("REGISTRANDO");
										// // document.getElementById("registro").submit();
										// location.href="7_login_signin.html";
									}
									else{
										alertify.alert('Alerta', 'Debes aceptar los términos y condiciones', function(){ alertify.error('Verifica campos'); });
										tyc.className = " form-check-input is-invalid";
										return false;
									}
								}
								else {
									alertify.alert('Alerta', 'Formato de contraseña inválido, por favor verifícalo', function(){ alertify.error('Verifica campos'); });
									contracv.className = "form-control textcolorw is-invalid";
									return false;
								}
							}
							else{
								alertify.alert('Alerta', 'Formato de email inválido, por favor verificalo, por favor verifícalo', function(){ alertify.error('Verifica campos'); });
								correov.className = "form-control textcolorw is-invalid";
								return false;
							}
						}
						else{
							alertify.alert('Alerta', 'Formato de telefono inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
							telv.className = "form-control textcolorw is-invalid";
							return false;
						}
					}
					else{
						alertify.alert('Alerta', 'Selecciona el sexo por favor', function(){ alertify.error('Verifica campos'); });
						sexv.className = "form-control textcolorw is-invalid";
						return false;
					}
				}
				else{
					alertify.alert('Alerta', 'Formato de apellido materno inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
					amv.className = "form-control textcolorw is-invalid";
					return false;
				}
			}
			else{
				alertify.alert('Alerta', 'Formato de apellido paterno inválido,por favor verificalo', function(){ alertify.error('Verifica campos'); });
				apv.className = "form-control textcolorw is-invalid";
				return false;
			}
		}
		else{
			alertify.alert('Alerta', 'Formato de NOMBRE inválido,por favor verificalo', function(){ alertify.error('Verifica campos'); });
			namv.className = "form-control textcolorw is-invalid";
			return false;
		}
	}
}

// ACTUALIZAR CURSO------------------------------------------------------------------------------------------
function validarActualizarC(){
	var nam = document.getElementById("nombre").value;
	var desc = document.getElementById("desc").value;
	var precio = document.getElementById("precio").value;
	var namv = document.getElementById("nombre");
	var descv = document.getElementById("desc");
	var preciov = document.getElementById("precio");

	var regnom=/^([A-Za-z\sáéíóú]{5,20})+$/;
	var regdesc=/^([A-Za-z\sáéíóú]{2,100})+$/;
	var regprecio=/^([0-9]{3,4})+$/;

	// Si estan vacios:
	if((nam=="") || (desc=="")  || (precio=="")){
		alertify.alert('Alerta', 'Se requiere que todos los campos esten llenos', function(){ alertify.error('Verifica campos'); });
		namv.className = "form-control  is-invalid";
		descv.className = "form-control  is-invalid";
		preciov.className = "form-control  is-invalid";
		return false;
	}
	else{//si no
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if(regnom.test(nam)){
			namv.className = "form-control textcolorw is-valid";
			if(regdesc.test(desc)){
				descv.className = "form-control textcolorw is-valid";
				if(regprecio.test(precio)){
					preciov.className = "form-control textcolorw is-valid";
					return true;
				}
				else{
					alertify.alert('Alerta', 'Formato de Precio inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
					preciov.className = "form-control textcolorw is-invalid";
					return false;
				}
			}
			else{
				alertify.alert('Alerta', 'Formato de Descripción inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
				descv.className = "form-control textcolorw is-invalid";
				return false;
			}
		}
		else{
			alertify.alert('Alerta', 'Formato de NOMBRE inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
			namv.className = "form-control textcolorw is-invalid";
			return false;
		}
	}
}

// ACTUALIZAR PRODUCTO------------------------------------------------------------------------------------------
function validarActualizarP(){
	var idcat = document.getElementById("idcat").value;
	var desc = document.getElementById("desc").value;
	var precio = document.getElementById("precio").value;
	// var imagen = document.getElementById("imagen").value;
	var idcatv = document.getElementById("idcat");
	var descv = document.getElementById("desc");
	var preciov = document.getElementById("precio");
	// var imagenv = document.getElementById("imagen");

	var regidcat=/^([0-9]{1,4})+$/;
	var regdesc=/^([A-Za-z\sáéíóú]{2,100})+$/;
	var regprecio=/^([0-9]{1,4})+$/;
	// var regimagen

	// Si estan vacios:
	if((idcat=="") || (desc=="")  || (precio=="")){
		alertify.alert('Alerta', 'Se requiere que todos los campos esten llenos', function(){ alertify.error('Verifica campos'); });
		idcatv.className = "form-control  is-invalid";
		descv.className = "form-control  is-invalid";
		preciov.className = "form-control  is-invalid";
		return false;
	}
	else{//si no
		/*VALIDA QUE EL formato de correo SEA VALIDO*/
		if(regidcat.test(idcat)){
			idcatv.className = "form-control textcolorw is-valid";
			if(regdesc.test(desc)){
				descv.className = "form-control textcolorw is-valid";
				if(regprecio.test(precio)){
					preciov.className = "form-control textcolorw is-valid";
					return true;
				}
				else{
					alertify.alert('Alerta', 'Formato de Precio inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
					preciov.className = "form-control textcolorw is-invalid";
					return false;
				}
			}
			else{
				alertify.alert('Alerta', 'Formato de Descripción inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
				descv.className = "form-control textcolorw is-invalid";
				return false;
			}
		}
		else{
			alertify.alert('Alerta', 'Formato de Id inválido, por favor verificalo', function(){ alertify.error('Verifica campos'); });
			idcatv.className = "form-control textcolorw is-invalid";
			return false;
		}
	}
}

