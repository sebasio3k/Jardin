<?php
    // include("conexion.php");
    // $id = $_POST['buscar'];
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = ""; 
    $q="";
    
        $q = $mysqli->real_escape_string($_POST['Id']);
        $query = "DELETE From cursos Where idcurso = $q. ";
        mysqli_query($mysqli,$query);
        $salida = "Curso eliminado Con Éxito";
        echo $salida;
        $mysqli->close();
    
   
?>