<?php
    session_start();

	include_once 'php/conecta.php';
    $mysqli = conecta();

    // CREAR VARIABLE DE SESION detalles PARA UTILZIARLA DESPUES
    $query = "SELECT * FROM detallev";
    // echo($query);
    $resultado = $mysqli->query($query);
    if($resultado -> num_rows > 0){
		if(!isset($_SESSION['detalles'])){
			$n=0;
        	while($fila=$resultado->fetch_assoc()){
                $listao=array(
                    'iddetv'=>$fila['iddetv'],
                    'idventa'=>$fila['idventa'],
                    'claveprod'=>$fila['claveprod'],
                    'cantidad'=>$fila['cantidad'],
                    'precio'=>$fila['precio'],
                    'importe'=>$fila['importe']
                );
                $_SESSION['detalles'][$n]=$listap;
                $n++;
            }
        }
    }
    // CREAR VARIABLE DE SESION ventas PARA UTILZIARLA DESPUES
    // $query = "SELECT * FROM detallev";
    // // echo($query);
    // $resultado = $mysqli->query($query);
    // if($resultado -> num_rows > 0){
	// 	if(!isset($_SESSION['detalles'])){
	// 		$n=0;
    //     	while($fila=$resultado->fetch_assoc()){
    //             $listao=array(
    //                 'iddetv'=>$fila['iddetv'],
    //                 'idventa'=>$fila['idventa'],
    //                 'claveprod'=>$fila['claveprod'],
    //                 'cantidad'=>$fila['cantidad'],
    //                 'precio'=>$fila['precio'],
    //                 'importe'=>$fila['importe']
    //             );
    //             $_SESSION['detalles'][$n]=$listap;
    //             $n++;
    //         }
    //     }
    // }

	$mysqli->close();

	// CREAR VARIABLE DE SESION cuantos PARA CONTROL DE CANTIDAD CARRITO
	if(!isset($_SESSION['cuantosdet'])){
        // $_SESSION['cuantaso']=0;
        $_SESSION['cuantosdet']= count($_SESSION['detalles']);
	}
	else{
		$_SESSION['cuantosdet']=$_SESSION['cuantosdet'];
	}
 //****************************************************************** */
    $salida = "";
    if(!isset($_SESSION['ordenes'])){
        $salida.="No hay ordenes generadas";
        echo $salida;
    }
    else {
        $longitud=count($_SESSION['ordenes']);
        $fila=$_SESSION['ordenes'];
        // $_SESSION['totalcompra']=0;
        print_r($fila);

        if($longitud>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table id='tablaor' class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Id Venta</th>
                                        <th scope='col'>Fecha de Compra</th>
                                        <th scope='col'>Fecha Entrega</th>
                                        <th scope='col'>Metodo de Pago</th>
                                        
                                        <th scope='col'>Total</th>
                                        <th scope='col'>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $longitud; $i++) {
                        $total = $fila[$i]['precio'] * $fila[$i]['cant'];
                        $salida.= "<tr>
                                        <td scope='row'>".$fila[$i]['descripcion']."</td>
                                        <td>".$fila[$i]['precio']."</td>
                                        <td>".$fila[$i]['cant']."</td>
                                        <td>".$total."</td>
                                        <td><img src='./img/prod/".$fila[$i]['idproducto'].".jpg'  class='card-img-top img-fluid'  alt='".$fila[$i]['descripcion']."'></td>
                                        <td><button id='$i' class='btn btn-danger' onclick='quita(this.id);'>Eliminar</button></td>
                                </tr>";
                        $_SESSION['totalcompra'] = $_SESSION['totalcompra'] + ($fila[$i]['precio']*$fila[$i]['cant']);
                    }
            // }
            $salida.="
            <tr>
            <td >Total</td>
            <td colspan='5'>$".number_format($_SESSION['totalcompra'],2)."</td>
            </tr>
            </tbody></table>";
            echo $salida;
        }
        else {
            $salida.="No hay datos :c";
        }
    }
?>






    $conexion=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela");
    //rescatar cuantos detallesv hay
    $sqldv = "SELECT * FROM detallev";
    $res=mysqli_query($conexion,$sqldv);
    $cuantosdv = $res->num_rows;


    