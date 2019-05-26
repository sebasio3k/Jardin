<?php
    $n=$_POST['n'];
    echo " num boton: ".$n;
    session_start();
    include_once 'conecta.php';
    $mysqli = conecta();
    //CREAR VARIABLE DE SESION ventas PARA UTILZIARLA DESPUES
    // $idus = $_SESSION['user']['idusuario'];
    // $query = "SELECT * FROM ventas WHERE idusuario = $idus";
    $s = $_SESSION['ventasu'][$n]['idventas'];
    $query3 = "SELECT * FROM detallev WHERE idventa = $s";
    echo(" <br> ".$query3);
    $resultado3 = $mysqli->query($query3);
    if($resultado3 -> num_rows > 0){
        // if(!isset($_SESSION['detallesu'])){
        $op=0;
        while($fila2=$resultado3->fetch_assoc()){
            $listaq=array(
                'iddetv'=>$fila2['iddetv'],
                'idventa'=>$fila2['idventa'],
                'claveprod'=>$fila2['claveprod'],
                'cantidad'=>$fila2['cantidad'],
                'precio'=>$fila2['precio'],
               'importe'=>$fila2['importe']
            );
            $_SESSION['detallesu'][$op]=$listaq;
            $op++;
        }
                    // }
                    // else{

                    // }
    }
    echo "<br> resultado: <br>";
    print_r($_SESSION['detallesu']);

    $fila2=$_SESSION['detallesu'];
    $numdet = $_SESSION['numdet'];

    $salida="
            <!-- TABLA DETALLE -->
            <table id='tablaord' class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                <thead class='thead-dark'>
                    <tr>
                        <th colspan='3'>DETALLES COMPRA</th>
                    </tr>
                    <tr>
                        <th scope='col'>Descripcion</th>
                        <th scope='col'>Precio</th>
                        <th scope='col'>Cantidad</th>
                        <th scope='col'>Producto</th>
                    </tr>
                </thead>
                <tbody>";
    $stp = $numdet[$n];
    echo "<br> repite: ".$stp;
    for ($i = 0; $i < $stp; $i++) {
        $v= $_SESSION['detallesu'][$i]['claveprod'];
        $nprod = $v;
        $salida.= "<tr>
                        <td scope='row'>".$_SESSION['productos'][$v]['descripcion']."</td>
                        <td>".$fila2[$i]['precio']."</td>
                        <td>".$fila2[$i]['cantidad']."</td>
                        <td><img src='./img/prod/".$fila2[$i]['claveprod'].".jpg'  class='card-img-top img-fluid' ></td>
                    </tr>";
    }
    $salida.="
                </tbody>
            </table>";
    echo $salida;
?>