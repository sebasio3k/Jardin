<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM usuarios ORDER BY idusuario";
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
                                    <th scope='col'>Apellido Paterno</th>
                                    <th scope='col'>Apellido Materno</th>
                                    <th scope='col'>Sexo</th>
                                    <th scope='col'>Tel&eacute;fono</th>
                                    <th scope='col'>Correo</th>
                                    <th scope='col'>Contrase&ntilde;a</th>
                                    <th scope='col'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>";
             $cont=0;
            while($fila=$resultado->fetch_assoc()){
                $cont++;
                // "<tr class='selected' id='$cont' onclick='seleccionar(this.id);'>
                $salida.= "<tr class='selected' id='$cont'>
                            <td><button id='$cont' class='btn btn-dark' href='javascript:void(0)' data-toggle='modal' data-target='#responsive' onclick='actualiza(this.id);'>Actualizar</button></td>
                            <td>".$fila['idusuario']."</td>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apaterno']."</td>
                            <td>".$fila['amaterno']."</td>
                            <td>".$fila['sexo']."</td>
                            <td>".$fila['telefono']."</td>
                            <td>".$fila['email']."</td>
                            <td>".$fila['password']."</td>
                            <td>".$fila['tipo']."</td>
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