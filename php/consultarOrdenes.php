<?php
    session_start();

	include_once 'conecta.php';
    $mysqli = conecta();

    //CREAR VARIABLE DE SESION ventas PARA UTILZIARLA DESPUES
    $idus = $_SESSION['user']['idusuario'];
    $query = "SELECT * FROM ventas WHERE idusuario = $idus";
    echo($query);
    $resultado = $mysqli->query($query);
    if($resultado -> num_rows > 0){
		// if(!isset($_SESSION['ventasu'])){
			$m=0;
        	while($fila=$resultado->fetch_assoc()){
                $listao=array(
                    'idventas'=>$fila['idventas'],
                    'idusuario'=>$fila['idusuario'],
                    'idmetodo'=>$fila['idmetodo'],
                    'fechacompra'=>$fila['fechacompra'],
                    'fechaentrega'=>$fila['fechaentrega'],
                    'estado'=>$fila['estado'],
                    'total'=>$fila['total']
                );
                // guarda venta en la posicion n
                $_SESSION['ventasu'][$m]=$listao;
                echo "<br>";
                // recuperar detalle venta
                $s =  $_SESSION['ventasu'][$m]['idventas'];
                // echo " <br>".$s;
                $query2 = "SELECT count(*) FROM detallev WHERE idventa = $s";
                echo($query2);
                // $resultado2 = $mysqli->query($query2);
                if ($resultado2 = $mysqli->query($query2)) {
                    $filax = $resultado2->fetch_row();
                    printf(" detv: ".$filax[0]);
                    $_SESSION['numdet'][$m]=$filax[0];
                }
                // $resultado2=mysqli_result($resultado2,0,'COUNT');
                // echo  " ".$resultado2;
                $m++;
            }
            echo "<br> num detall: <br>";
            print_r($_SESSION['numdet']);
            echo "<br> ventas u <br>";
            print_r($_SESSION['ventasu']);
            // echo "detallesu u".PHP_EOL;
            // print_r($_SESSION['detallesu']);
        // }
        // else{
        //     $_SESSION['ventasu'] = $_SESSION['ventasu'];
        // }
    }
    else{
        echo "No hay ventas de este usuario";
    }
    echo " | <br>";
    
    // $arreglo = $_SESSION['numdet'];
    // printf ($arreglo);
    // CREAR VARIABLE DE SESION detalles PARA UTILZIARLA DESPUES
    // $query2 = "SELECT * FROM detallev WHERE idusuario = $idus";
    // echo($query);
    // $resultado2 = $mysqli->query($query2);
    // if($resultado2 -> num_rows > 0){
	// 	if(!isset($_SESSION['detallesu'])){
	// 		$n=0;
    //     	while($fila=$resultado2->fetch_assoc()){
    //             $listao=array(
    //                 'iddetv'=>$fila['iddetv'],
    //                 'idventa'=>$fila['idventa'],
    //                 'claveprod'=>$fila['claveprod'],
    //                 'cantidad'=>$fila['cantidad'],
    //                 'precio'=>$fila['precio'],
    //                 'importe'=>$fila['importe']
    //             );
    //             $_SESSION['detallesu'][$n]=$listap;
    //             $n++;
    //         }
    //         $_SESSION['cuantosdet'] = count($_SESSION['detalles']);
    //     }
    //     else{
    //         $_SESSION['cuantosdet']=$_SESSION['cuantosdet'];
    //     }
    // }

    $mysqli->close();
    $cuantasor = count($_SESSION['ventasu']);
    echo " <br> cuantas ordenes: <br>".$cuantasor;

 //****************************************************************** */
 
    $salida = "";
    if($cuantasor == 0){
        $salida.="No hay ordenes generadas";
        echo $salida;
    }
    else {
        //guarda vecto de ventas del usuario en fila
        $fila=$_SESSION['ventasu'];
        // $fila2=$_SESSION['detallesu'];
        // print_r($fila2);
        //guarda vector de cuantos detalles tiene cada venta del usuario en numdet
        $numdet = $_SESSION['numdet'];
        // $_SESSION['totalcompra']=0;
        // print_r($fila);

        if($cuantasor>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table id='tablaor' class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th colspan='7'>ORDENES</th>
                                    </tr>
                                    <tr>
                                        <th scope='col'>Folio Orden</th>
                                        <th scope='col'>Fecha de Compra</th>
                                        <th scope='col'>Fecha Entrega</th>
                                        <th scope='col'>Metodo de Pago</th>
                                        <th scope='col'>Total</th>
                                        <th scope='col'>Estatus</th>
                                        <th scope='col'>Opcion</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $cuantasor; $i++) {
                        $salida.= "<tr>
                                        <td scope='row'>".$fila[$i]['idventas']."</td>
                                        <td>".$fila[$i]['fechacompra']."</td>
                                        <td>".$fila[$i]['fechaentrega']."</td>";

                        if($fila[$i]['idmetodo']=="1"){
                            $salida.="  <td>Pago en Tienda</td>";
                        }
                        else{
                            $salida.="  <td>Pago con tarjeta</td>";
                        }
                        $salida.= "
                                <td>$".number_format($fila[$i]['total'],2)."</td>
                                <td>".$fila[$i]['estado']."</td>
                                <td><button id='$i' class='btn btn-dark' href='javascript:void(0)' data-toggle='modal' data-target='#responsive' onclick='det(this.id);'>Ver Detalle</button></td>
                            </tr>";
                    }
            // }
            $salida.="</tbody></table> ";
            echo $salida;
        }
        else {
            $salida.="No hay ordenes generadas";
        }
    }
?>
