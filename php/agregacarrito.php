<?php
    session_start();
    $codi=$_POST['codi'];
    $_SESSION['can'] = $_POST['can'];
    // $cantidad = =$_POST['can'];
    $salida = "";

    // $longitud=count($_SESSION['carrito']);
    // $_SESSION['carrito']=$longitud;


    // se crea variable de carrito para almacenar productos que el usuario ha agregado
    if(!isset($_SESSION['carrito'])){
        $listac=array(
            'idproducto'=>$codi,
            // 'idcategoria'=>$fila['idcategoria'],
            'descripcion'=>$_SESSION['productos'][$codi-1]['descripcion'],
            'precio'=>$_SESSION['productos'][$codi-1]['precio'],
            'cant'=>$_SESSION['can']
             // 'ruta'=>$fila['ruta']
            // 'stock'=>$id,
         );
        $_SESSION['carrito'][0]=$listac;
    }
    else{
        $cuantosp=count($_SESSION['carrito']);
        $listac=array(
            'idproducto'=>$codi,
            // 'idcategoria'=>$fila['idcategoria'],
            'descripcion'=>$_SESSION['productos'][$codi-1]['descripcion'],
            'precio'=>$_SESSION['productos'][$codi-1]['precio'],
            'cant'=>$_SESSION['can']
            // 'ruta'=>$fila['ruta']
            // 'stock'=>$id,
        );
        $_SESSION['carrito'][$cuantosp]=$listac;
    }
    $_SESSION['cuantos']=count($_SESSION['carrito']);
    echo  print_r($_SESSION['carrito'],true);

?>