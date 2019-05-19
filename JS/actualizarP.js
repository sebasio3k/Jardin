var num=0;
	 function actualiza (n){

	num = n;
	}

$('#actualizar').click(function(){


	if($('#idcat').val()=="" ){
		alertify.alert("Debes agregar el id de categorría");
		return false;
	}else if($('#desc').val()==""){
		alertify.alert("Debes agregar la descripcion");
		return false;
	}else if($('#precio').val()==""){
		alertify.alert("Debes agregar el precio");
		return false;
	// }else if($('#ima').val()==""){
	// 	alertify.alert("Debes agregar la imagen");
	// 	return false;
    // }
    }


	console.log(num);
	var Id = document.getElementById(num).getElementsByTagName('td')[1].innerHTML;
	console.log(Id)

			if(Id == $('#ima').val()){
				// console.log(cadena);
				cadena="id=" + Id +
								"&idc=" + $('#idcat').val() +
								"&desc=" + $('#desc').val() +
								"&precio=" + $('#precio').val() +
								"&ima=" + $('#ima').val();

				$.ajax({
					type:"POST",
					url:"php/actualizarP.php",
					data:cadena,
					success:function(r){

						if(r==2){
							alertify.alert("Este Producto ya existe, prueba con otro :)");
						}
						else if(r==1){
							$('#formap')[0].reset();
							buscar_datos();
								alertify.confirm('Mensaje', 'Producto Actualizado con exito',
								function(){
									alertify.success('Actualizado');
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
			}
			else{
				alertify.alert("El nombre de imagen debe ser igual al id");
			}

});