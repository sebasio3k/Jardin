<?php
    $mysqli = new mysqli("localhost","Sebastian","ifuseekamy","jardinabuela");
        if($mysqli->connect_errno):
            echo "Error al conectarse con MySQL debido a error ".$mysql->connect_error;
        endif;
?>