<?php
    session_start();
    $salida = "";
    if(!isset($_SESSION['carrito'])){
        $salida.="No hay productos en su carrito";
        echo $salida;
    }
    else {
        $longitud=count($_SESSION['carrito']);
        $fila=$_SESSION['carrito'];
        $_SESSION['totalcompra']=0;

        // print_r($fila);

        if($longitud>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table id='tablapl' class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Descripcion</th>
                                        <th scope='col'>Precio</th>
                                        <th scope='col'>Cantidad</th>
                                        <th scope='col'>Total</th>
                                        <th scope='col'>Producto</th>
                                        <th scope='col'>Opcion</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $longitud; $i++) {
                        $total = $fila[$i]['precio'] * $fila[$i]['cant'];
                        $salida.= "<tr>
                                        <td scope='row'>".$fila[$i]['descripcion']."</td>
                                        <td>$".number_format($fila[$i]['precio'],2)."</td>
                                        <td>".$fila[$i]['cant']."</td>
                                        <td>$".number_format($total,2)."</td>
                                        <td><img src='./img/prod/".$fila[$i]['idproducto'].".jpg'  class='card-img-top img-fluid'  alt='".$fila[$i]['descripcion']."'></td>
                                        <td><button id='$i' class='btn btn-danger' onclick='quita(this.id);'>Eliminar</button></td>
                                </tr>";
                        $_SESSION['totalcompra'] = $_SESSION['totalcompra'] + ($fila[$i]['precio']*$fila[$i]['cant']);
                    }
            // }
            $salida.="
            <tr>
            <td >Total Compra</td>
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