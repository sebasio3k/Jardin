<?php

    session_start();
    include 'php/MetodosDAO.php';

    $codi=$_REQUEST['cod'];
    $_SESSION['codigo']=$codi;
    $listap = $_SESSION['productos'];
    $salida = "";
    $longitud=count($_SESSION['productos']);
    $nombre=$_SESSION['productos'][$codi-1]['descripcion'];
    $precio=$_SESSION['productos'][$codi-1]['precio'];


    // $fila=$_SESSION['productos'];
    // // if($resultado -> num_rows > 0){
    //     $salida.= "<div class='card-deck'>
    //                 ";
    //     $count = 0;
    //     $count2=0;
    //     // while($fila=$resultado->fetch_assoc()){
    //         // $count2++;
    //         for ($o=0; $o<$longitud; $o++){
    //             $count2++;
    //         $salida.= "

    // echo $cod;

    // $objMetodos=new MetodosDAO();
    // $lista=$objMetodos->ListarProductosCod($cod);
    // print_r ($lista);
    // foreach($lista as $row){
    //     $nombre=$row[2];
    //     $precio=$row[3];
    // }
    // print_r($nombre);
    // print_r($precio);

    // echo $nombre;
    // echo $precio;

    // require_once "php/conexion.php";
	// $conexion=conexion();
	// $sql="SELECT * FROM productos WHERE idproducto='$codi'";
	// // echo $result=mysqli_query($conexion,$sql);
    // $resultado = $conexion->query($sql);

    // if($resultado -> num_rows > 0){

    //     while($fila=$resultado->fetch_assoc()){
    //         $nombre=$fila['descripcion'];
    //         $precio=$fila['precio'];
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle Producto</title>
    <link rel="stylesheet" type="text/css" href=".\CSS\estilos.css">
	<!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- /Bootstrap -->
	<!-- hoja de estilos2 para barra busqueda -->
	<link rel="stylesheet" href=".\CSS\estilos2.css">
	<!-- ICONO EN LA PESTAÑA -->
	<link rel="shortcur icon" href=".\img\icon.png">
</head>
<body>
    <!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $nombre; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="col text-center justify-content-center">
						<img class="img-fluid" src="./img/prod/<?php echo $codi; ?>.jpg" alt="" width="200" heigh="170">
					</div>
					<div class="row justify-content-center b">
						<div class="col b">
							$/. <?php echo $precio; ?>
						</div>
						<div class="col">
							Ingrese Cantidad: <input type="number" min="1" max="100" value="1" id="txtcan" name="txtcan">
						</div>
					</div>
                </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agrega(<?php echo $codi; ?>);">Agregar a Carrito</button>
                <!-- cuando de clic en boton manda id de producto seleccionado a funcion agrega en 4_productos2.php -->
			</div>
			</div>
		</div>
	</div>



    <!-- ,docuemt.getElementById('#txtcan').val() -->
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center justify-content-center">
                <img class="img-fluid" src="./img/prod/<?php echo $cod; ?>.jpg" alt="" width="200" heigh="170">
            </div>
            <div class="col text-center justify-content-center">
                <p class="b"> <?php echo $nombre;?></p>
                <div class="row justify-content-center b">
                    <div class="col b">
                        $/. <?php echo $precio;?>
                    </div>
                    <div class="col">
                        Ingrese Cantidad: <input type="number" min="1" max="100" value="1" name="txtcan">
                    </div>
                </div>
                <form action="">
                    <div class="row justify-content-center b">
                        <div class="col">
                            <button type="button" class="btn btn-secondary">Cerrar
                            </button>
                            <button type="button" class="btn btn-primary">Agregar a Carrito
                             </button>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Scripts Bootstrap JQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
</body>
</html>
