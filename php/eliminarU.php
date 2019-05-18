<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "";
    $q="";

        $q = $mysqli->real_escape_string($_POST['Id']);
        $query = "DELETE From usuarios Where idusuario = $q. ";
        mysqli_query($mysqli,$query);
        $salida = "Usuario eliminado Con Éxito";
        echo $salida;
        $mysqli->close();


?>