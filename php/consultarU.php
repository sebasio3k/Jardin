<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM usuarios ORDER BY idusuario"; 
    $q="";
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT idusuario,nombre,apaterno,amaterno,sexo,telefono,email,password,tipo FROM usuarios WHERE idusuario LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR email LIKE '%".$q."%' OR tipo LIKE '%".$q."%' ";
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
            while($fila=$resultado->fetch_assoc()){
                $salida.= "<tr>
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
        }
        else {
            $salida.="No hay datos :c";
        }
    // }
    }
    echo $salida;
    $mysqli->close();
?>