<?php
header("Content-type: image/gif");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysql_connect("localhost", "root", "") or die ("ERROR AL CONECTAR");
    $db_select = mysql_select_db("jardinabuela") or die ("ERROR AL SELECCIONAR DB");

    $q = "SELECT * FROM productos WHERE idproducto = '$id'";
    $result = mysql_query($q, $link) or die ("Error al consultar");

    while ($row = mysql_fetch_assoc($result)) {
    echo $row["imagen"];
    }

    mysql_free_result($result);
    } else {
        echo 'NO ID';
        }
?>