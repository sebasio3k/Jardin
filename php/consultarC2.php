<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM cursos ORDER BY idcurso";
    $q="";
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT idcurso,nombrecurso,descripcion,precio,fecha FROM cursos WHERE idcurso LIKE '%".$q."%' OR nombrecurso LIKE '%".$q."%' OR precio LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

    // if ($resultado == ""){

    // }
    // else {
    if($q==""){

    }
    else{
        if($resultado -> num_rows > 0){
            $salida.= "<table class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Nombre Curso</th>
                                    <th scope='col'>Descripción</th>
                                    <th scope='col'>Precio</th>
                                </tr>
                            </thead>
                            <tbody>";
            while($fila=$resultado->fetch_assoc()){
                $salida.= "<tr>
                            <td>".$fila['idcurso']."</td>
                            <td>".$fila['nombrecurso']."</td>
                            <td>".$fila['descripcion']."</td>
                            <td>".$fila['precio']."</td>
                            </tr>";
            }
            $salida.="</tbody></table>";
        }
        else {
            $salida.="No hay datos :c";
        }
    // }
    }
    echo $salida;
    $mysqli->close();
?>