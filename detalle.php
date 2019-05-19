<?php

    include 'php/MetodosDAO.php';

    $cod=$_REQUEST['cod'];
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

    require_once "php/conexion.php";
	$conexion=conexion();
	$sql="SELECT * FROM productos WHERE idproducto='$cod'";
	// echo $result=mysqli_query($conexion,$sql);
    $resultado = $conexion->query($sql);

    if($resultado -> num_rows > 0){

        while($fila=$resultado->fetch_assoc()){
            $nombre=$fila['descripcion'];
            $precio=$fila['precio'];
        }
    }

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center justify-content-center">
                <form action="">
                    <table border="10">
                        <thead>
                            <th class="b">
                                Producto
                            </th>
                            <th class="b">
                               <p> <?php echo $nombre;?></p>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="4">
                                    <img class="img-fluid" src="./img/prod/<?php echo $cod; ?>.jpg" alt="" width="200" heigh="170">
                                </td>
                                <td class="b">
                                    S/. <?php echo $precio;?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="b"> Ingrese Cantidad: <input type="number" min="1" max="100" value="1" name="txtcan"></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-secondary">Cerrar
                                    </button>
                                    <button type="button" class="btn btn-primary">Agregar a Carrito
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts Bootstrap JQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src=".\JS\jquery.js"></script>
	<script src=".\JS\jquery.dataTables.min.js"></script>
	<script src="./JS/buscador.js"></script>
</body>
</html>