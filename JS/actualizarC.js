var num=0;

function actualiza (n){
	num = n;
}

$('#actualizar').click(function(){

	if($('#nombre').val()=="" ){
		alertify.alert("Debes agregar el nombre del curso");
		return false;
	}else if($('#desc').val()==""){
		alertify.alert("Debes agregar la descripcion del curso");
		return false;
	}else if($('#precio').val()==""){
		alertify.alert("Debes agregar el precio del curso");
		return false;
	}

	console.log(num);
	var Id = document.getElementById(num).getElementsByTagName('td')[1].innerHTML;
	console.log(Id)
	
	cadena="id=" + Id +
			"&nombre=" + $('#nombre').val() +
			"&desc=" + $('#desc').val() +
			"&precio=" + $('#precio').val();
			// console.log(cadena);
			$.ajax({
				type:"POST",
				url:"php/actualizarC.php",
				data:cadena,
				success:function(r){

					if(r==2){
						alertify.alert("Este curso ya existe, prueba con otro :)");
					}
					else if(r==1){
						$('#formac')[0].reset();
						buscar_datos();
						alertify.confirm('Mensaje', 'Curso Actualizado con exito',
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