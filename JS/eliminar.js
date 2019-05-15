$(document).ready(function(){
    $('#btn_del').click(function(){
        // console.log(Id);
        // Si no se ha seleccionado ningun row no hace nada
        if(Id==0){

        }
        else{// Pregunta antes de eliminar
            alertify.confirm("ATENCION","¿Esta SEGURO de eliminar el registro seleccionado?",
            function(){
                alertify.success('Eliminado');
                eliminar();
                buscar_datos();
                Id=0;
                counter=0;
            },
            function(){
                alertify.error('Cancelado');
            }).set('labels', {ok:'Estoy Seguro.', cancel:'¡Cancelar!'});
        }
       
    });
});

var id_fila_selected;
var Id=0;
var counter=0;

function seleccionar(id_fila){
    if($('#'+id_fila).hasClass('seleccionada')){
        $('#'+id_fila).removeClass('seleccionada');
        counter=0;
    }
    else{
        $('#'+id_fila).addClass('seleccionada');
        counter++;   
    }
    id_fila_selected = id_fila;
    if (counter>1){
        $('#'+id_fila).removeClass('seleccionada');
        alertify.alert("ATENCION","Sólo se puede eliminar un registro a la vez",
            function(){
                alertify.error('Selecciona solo 1 campo');
            });
    }
    else{
        Id = document.getElementById(id_fila).getElementsByTagName('td')[0].innerHTML;
        console.log(Id)
    }
    
}

function eliminar(){
   
    $.ajax({
		url:"php/eliminar.php",
		type:"POST",
		dataType:'html',
		data: {Id: Id}
	})
	.done(function(respuesta){
		alert( respuesta);
	})
	.fail(function(){
        console.log("Error");
        buscar_datos();
	})

    $('#'+Id).remove();
}