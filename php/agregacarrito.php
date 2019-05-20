<?php
    session_start();
            // session_start();
            $codi=$_POST['codi'];
            if(!isset($_SESSION['carrito'])){
                $listac=array(
                    'idproducto'=>$codi,
                    // 'idcategoria'=>$fila['idcategoria'],
                    'descripcion'=>$_SESSION['productos'][$codi]['descripcion'],
                    'precio'=>$_SESSION['productos'][$codi]['precio']
                    // 'ruta'=>$fila['ruta']
                    // 'stock'=>$id,
                );
                $_SESSION['carrito'][0]=$listac;
            }
            else{
                $numeroPrdo=count($_SESSION['carrito']);
                $listac=array(
                    'idproducto'=>$codi,
                    // 'idcategoria'=>$fila['idcategoria'],
                    'descripcion'=>$_SESSION['productos'][$codi]['descripcion'],
                    'precio'=>$_SESSION['productos'][$codi]['precio']
                    // 'ruta'=>$fila['ruta']
                    // 'stock'=>$id,
                );
                $_SESSION['carrito'][$numeroPrdo]=$listac;
            }
            $_SESSION['cuantos']=count($_SESSION['carrito']);
           echo  print_r($_SESSION['carrito'],true);
        ?>