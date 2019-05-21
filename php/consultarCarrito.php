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
        print_r($fila);

        if($longitud>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Producto</th>
                                        <th scope='col'>Descripción</th>
                                        <th scope='col'>Precio</th>
                                        <th scope='col'>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $longitud; $i++) {
                        $salida.= "<tr>
                                        <td scope='row'>".$fila[$i]['descripcion']."</td>
                                        <td>".$fila[$i]['precio']."</td>
                                        <td>".$fila[$i]['cant']."</td>
                                        <td><img src='./img/prod/".$fila[$i]['idproducto'].".jpg'  class='card-img-top img-fluid'  alt='".$fila[$i]['descripcion']."'></td>
                                </tr>";
                    }
            // }
            $salida.="</tbody></table>";
            echo $salida;
        }
        else {
            $salida.="No hay datos :c";
        }
    }
?>