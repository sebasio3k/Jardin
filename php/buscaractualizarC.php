<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM cursos ORDER BY idcurso";
    $q="";

    $resultado = $mysqli->query($query);

    // if ($resultado == ""){

    // }
    // else {

        if($resultado -> num_rows > 0){
            $salida.= "<table class='table bgblanco textcolorb table-responsive  table-sm' id='tabla'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>Editar</th>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Nombre</th>
                                    <th scope='col'>Descripción</th>
                                    <th scope='col'>Precio</th>
                                </tr>
                            </thead>
                            <tbody>";
             $cont=0;
            while($fila=$resultado->fetch_assoc()){
                $cont++;
                // "<tr class='selected' id='$cont' onclick='seleccionar(this.id);'>
                $salida.= "<tr class='selected' id='$cont'>
                            <td><button id='$cont' class='btn btn-dark' href='javascript:void(0)' data-toggle='modal' data-target='#responsive' onclick='actualiza(this.id);'>Actualizar</button></td>
                            <td>".$fila['idcurso']."</td>
                            <td>".$fila['nombrecurso']."</td>
                            <td>".$fila['descripcion']."</td>
                            <td>".$fila['precio']."</td>
                            </tr>";
            }
            $salida.="</tbody></table>";
            // echo $salida;
        }
        else {
            $salida.="No hay datos :c";
        }
    // }
    echo $salida;
    $mysqli->close();
?>