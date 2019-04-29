var consulta = $("#searchTable").DataTable();

$("#inputBusqueda").keyup(function(){
	consulta.search($(this).val()).draw();

	$("header").css({
		"height": "100vh",
		"background": "rgba(0,0,0,0.5)"
	})

	if ($("#inputBusqueda").val() == ""){
		$("header").css({
			"height": "auto",
			"background": "rgba(0,0,0,0.6)"
		})

		$("#search").hide()

	} else {
		$("#search").fadeIn("fast");
	}
})

function foco(){
	$("header").css({
			"height": "auto",
			"background": "rgba(0,0,0,0.6)"
		})

		$("#search").hide()
}