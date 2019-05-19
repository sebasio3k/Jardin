<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM productos ORDER BY idproducto";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT idproducto,idcategoria,descripcion,precio,imagen FROM productos WHERE idproducto LIKE '%".$q."%' OR descripcion LIKE '%".$q."%' OR precio LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

    if ($resultado == "") {

    }
    else {
        if($resultado -> num_rows > 0){
            $salida.= "<table id='tabladin' class='table bgblanco textcolorb table-responsive table-sm table table-striped'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Categoria</th>
                                    <th scope='col'>Descripcion</th>
                                    <th scope='col'>Precio</th>
                                    <th scope='col'>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>";
            while($fila=$resultado->fetch_assoc()){
                $salida.= "<tr>
                                <td>".$fila['idproducto']."</td>
                                <td>".$fila['idcategoria']."</td>
                                <td>".$fila['descripcion']."</td>
                                <td>".$fila['precio']."</td>
                                <td><img src='./img/prod/".$fila['idproducto'].".jpg'  class='card-img-top img-fluid'></td>
                            </tr>";
            }
            $salida.="</tbody></table>";
        }
        else {
            $salida.="No hay datos :c";
        }
    }
    echo $salida;
    $mysqli->close();
?>