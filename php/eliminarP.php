<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "";
    $q="";

        $q = $mysqli->real_escape_string($_POST['Id']);
        $query = "DELETE From productos Where idproducto = $q. ";
        mysqli_query($mysqli,$query);
        $salida = "Producto eliminado Con Éxito";
        echo $salida;
        $mysqli->close();

?>