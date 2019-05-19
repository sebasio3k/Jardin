<?php
    session_start();

    include 'MetodosDAO.php';
    $op=$_REQUEST['op'];

    switch($op){
        case 1:
            unset($_SESSION['lista']);
            // MetodosDAO = listado
            $objMetodo=new MetodosDAO();
            $lista=$objMetodo->ListarProductos();
            $_SESSION['lista']=$lista;
            header("location: ../4_productos2.php");
            break;
        case 2:
        break;
    }
?>