//Funcion autoinvocada
(function(){
	var formulario = document.formlogin;
	var elementos = document.formlogin.elements;
	var boton = document.getElementById(btn);

	//Functions--------------------------------------------------
	
	//Comprobar otras funciones
	var enviar = function(e){
		if(!validarInputs()){
			console.log('Falto validar los inputs');
			e.preventDefault();
		}
		else {
			if(!validarRadios()){
				console.log('Falto validar los radios');
				e.preventDefault();
			}
			else {
				if(!validarCheckbox()){
					console.log('Falto validar los Checkbox');
					e.preventDefault();
				}
				else{
					console.log('Envia Correctamente');
					//Comentar linea cuando tengamos formulario listo
					//e.preventDefault();
				}
			}
		}
	}

	//Funciones Blur y Focus
	var focusInput = function(){
		//si se da clic en la etiqueta pone focus en input
		this.parentElement.children[1].className = "label ";
		
		this.parentElement.children[0].className = this.parentElement.children[0].className.replace("form-control is-invalid", "");
	};
	var blurInput = function(){
		//si usuario no ha tecleado nada
		if(this.value <= 0) {
			//y si sale de focus de input pone clase error
			this.parentElement.children[1].className = "label";
			this.parentElement.children[0].className = this.parentElement.children[0].className + "form-control is-invalid";
		}
	};



	//Eventos--------------------------------------------------------

	formulario.addEventListener("submit", enviar);

	//Recorrer imputs
	for(var i=0; i<elementos.length; i++){
		if( elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password"){
			elementos[i].addEventListener("focus", focusInput);
			elementos[i].addEventListener("blur", blurInput);
		}
	}

}());