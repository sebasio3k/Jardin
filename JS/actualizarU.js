var num=0;
	 function actualiza (n){
	
	num = n;
	}

	var combo = document.getElementById("tipou");
	var sele = combo.options[combo.selectedIndex].text;

$('#actualizar').click(function(){

	
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
	}else if($('#pass').val()==""){
		alertify.alert("Debes agregar el password");
		return false;
	}else if( sele == ""){
		alertify.alert("Debes seleccionar el tipo de usuario");
		return false;
	}


	console.log(num);
	var Id = document.getElementById(num).getElementsByTagName('td')[1].innerHTML;
	console.log(Id)
	
	cadena="id=" + Id +
			"&nombre=" + $('#nombre').val() +
			"&ap=" + $('#ap').val() +
			"&am=" + $('#am').val() +
			"&sex=" + $('input[name=sexo]:checked').val() +
			"&phone=" + $('#phone').val() +
			"&usuario=" + $('#email').val() + 
			"&password=" + $('#pass').val()+
			"&tipo=" + sele;
			// console.log(cadena);
			$.ajax({
				type:"POST",
				url:"php/actualizarU.php",
				data:cadena,
				success:function(r){

					if(r==2){
						alertify.alert("Este usuario ya existe, prueba con otro :)");
					}
					else if(r==1){
						$('#formau')[0].reset();
						buscar_datos();
						alertify.confirm('Mensaje', 'Usuario Actualizado con exito',
							function(){
								alertify.success('Actuaizado');
							  },
							function(){
								alertify.error('Cancel');
							});
					}else{
						alertify.error("Fallo al Actualizar");
					}
					
					console.log(r);
				}
			});

});