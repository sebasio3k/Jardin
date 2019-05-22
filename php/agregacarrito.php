<?php
    session_start();
    $codi=$_POST['codi'];
    $can = $_POST['can'];
    // $cantidad = =$_POST['can'];
    $salida = "";
    $bandera=false;

    // $longitud=count($_SESSION['carrito']);
    // $_SESSION['carrito']=$longitud;


    // se crea variable de carrito para almacenar productos que el usuario ha agregado
    if(!isset($_SESSION['carrito'])){
        $listac=array(
            'idproducto'=>$codi,
            // 'idcategoria'=>$fila['idcategoria'],
            'descripcion'=>$_SESSION['productos'][$codi-1]['descripcion'],
            'precio'=>$_SESSION['productos'][$codi-1]['precio'],
            'cant'=>$can
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
            'cant'=>$can
            // 'ruta'=>$fila['ruta']
            // 'stock'=>$id,
        );
        // $_SESSION['carrito'][$cuantosp]=$listac;
        // recorrer vector
        for($i=0; $i<$cuantosp; $i++){
            // if($_SESSION['carrito'][$i]['idproducto']==$_SESSION['carrito'][$i+1]['idproducto']){
            if($_SESSION['carrito'][$i]['idproducto']==$listac['idproducto']){
                $_SESSION['carrito'][$i]['cant'] = $_SESSION['carrito'][$i]['cant']+$listac['cant'];
                // for($j=0; $j==$i; $j++){
                //     $listac=array(
                //         'idproducto'=>$_SESSION['carrito'][$j]['idproducto'],
                //         // 'idcategoria'=>$fila['idcategoria'],
                //         'descripcion'=>$_SESSION['carrito'][$j]['descripcion'],
                //         'precio'=>$_SESSION['carrito'][$j]['precio'],
                //         'cant'=>$_SESSION[$j]['can']
                //         // 'ruta'=>$fila['ruta']
                //         // 'stock'=>$id,
                //     );
                //     $_SESSION['carrito'][$j]=$listac;
                // }
                $bandera=true;
                break;
            }
            else{
                
                // if($_SESSION['carrito'][$i+1]['idproducto']==$listac['idproducto']){
                //     // $_SESSION['carrito'][$i+1]=$listac;
                // }
                // else{
                   
                // }
            }

        }
        if($bandera){
            // ya sumo la cantidad, no se guarda
        }
        else{
            $_SESSION['carrito'][$cuantosp]=$listac;
        }
    }
    $can=0;
    $_SESSION['cuantos']=count($_SESSION['carrito']);
    // echo  $c =  $_SESSION['cuantos'];
    echo  print_r($_SESSION['carrito'],true);

?>