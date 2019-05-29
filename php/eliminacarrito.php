<?php
    session_start();
    $nb=$_POST['n'];
    print($nb);
    $band=false;
    // $listac = $_SESSION['carrito'];
    $longitud=count($_SESSION['carrito']);
    // $j = 0;

    // foreach($_SESSION['carrito'] as $list=>$_SESSION['carrito']){
            
    //         if($_SESSION['carrito']['idproducto'] == $nb){
    //             unset($_SESSION['carrito'][$list]);
    //         }
    // }

    // for ($i = 0; $i < $longitud; $i++) {
    //     if($nb==0 && $longitud==1){
    //         echo " unico ";
    //         unset($_SESSION['carrito']);
    //         $_SESSION['cuantos']=0;
    //         // $band=true;
    //         break;
    //     }
    //     else{
    //         unset($_SESSION['carrito'][$i]);
    //         break;
    //     }
    //     // if($i == $nb){
            
    //     // }
    // }


    for ($i = 0; $i < $longitud; $i++) {
        if($band==true){
            echo " true ";
            // $i++;
            $listac=array(
                'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
                // 'idcategoria'=>$fila['idcategoria'],
                'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
                'precio'=>$_SESSION['carrito'][$i]['precio'],
                'cant'=>$_SESSION['carrito'][$i]['cant']
                // 'ruta'=>$fila['ruta']
                // 'stock'=>$id,
            );
                // unset($_SESSION['carrito']);
                unset($_SESSION['carrito'][$i]);
                $_SESSION['carrito'][$i-1]=$listac;
                header('Location: 4_productos2.php');
                // $j++;
        }
        else{
            if($nb==0 && $longitud==1){
                echo " unico ";
                unset($_SESSION['carrito']);
                $_SESSION['cuantos']=0;
                $band=true;
                break;
            }
            else{
                if($i == $nb && $band==false){
                    echo " primero y mas de uno ";

                    if(!empty($_SESSION['carrito'][$i+1])){
                        echo " hay mas ";
                        $i++;
                        $listac=array(
                            'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
                            // 'idcategoria'=>$fila['idcategoria'],
                            'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
                            'precio'=>$_SESSION['carrito'][$i]['precio'],
                            'cant'=>$_SESSION['carrito'][$i]['cant']
                            // 'ruta'=>$fila['ruta']
                            // 'stock'=>$id,
                        );
                            unset($_SESSION['carrito'][$i]);
                            $_SESSION['carrito'][$i-1]=$listac;
                            // $j++;
                            $band=true;
                    }
                    else{
                        echo " ultimo ";
                        $listac=array(
                            'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
                            // 'idcategoria'=>$fila['idcategoria'],
                            'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
                            'precio'=>$_SESSION['carrito'][$i]['precio'],
                            'cant'=>$_SESSION['carrito'][$i]['cant']
                            // 'ruta'=>$fila['ruta']
                            // 'stock'=>$id,
                        );
                            unset($_SESSION['carrito'][$i]);
                            // $_SESSION['carrito'][$j]=$listac;
                            // $j++;
                            $band=true;
                            break;
                    }
                }
                else{
                    echo " incrementa ";
                }

            }

        }
    }



    //     if($band==true){
    //         echo " true ";
    //         $i++;
    //         $listac=array(
    //             'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
    //             // 'idcategoria'=>$fila['idcategoria'],
    //             'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
    //             'precio'=>$_SESSION['carrito'][$i]['precio'],
    //             'cant'=>$_SESSION['carrito'][$i]['cant']
    //             // 'ruta'=>$fila['ruta']
    //             // 'stock'=>$id,
    //         );
    //             // unset($_SESSION['carrito']);
    //             $_SESSION['carrito'][$j]=$listac;
    //             $j++;
    //             $band=true;
    //     }
    //     if($nb==0 && $longitud==1){
    //         echo " unico ";
    //         unset($_SESSION['carrito']);
    //         $_SESSION['cuantos']=0;
    //         $band=true;
    //         break;
    //     }
    //     else{
    //         if($i == $nb && $band=false){
    //             echo " primero y mas de uno ";
    //             $i++;
    //             $listac=array(
    //                 'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
    //                 // 'idcategoria'=>$fila['idcategoria'],
    //                 'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
    //                 'precio'=>$_SESSION['carrito'][$i]['precio'],
    //                 'cant'=>$_SESSION['carrito'][$i]['cant']
    //                 // 'ruta'=>$fila['ruta']
    //                 // 'stock'=>$id,
    //             );
    //                 unset($_SESSION['carrito']);
    //                 $_SESSION['carrito'][$j]=$listac;
    //                 $j++;
    //                 $band=true;
    //         }
    //         else{
    //             if($i == $nb){
    //                 echo "esto";
    //                 // $i++;
    //                 $listac=array(
    //                     'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
    //                     // 'idcategoria'=>$fila['idcategoria'],
    //                     'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
    //                     'precio'=>$_SESSION['carrito'][$i]['precio'],
    //                     'cant'=>$_SESSION['carrito'][$i]['cant']
    //                     // 'ruta'=>$fila['ruta']
    //                     // 'stock'=>$id,
    //                 );
    //                 $_SESSION['carrito'][$j]=$listac;
    //                 $j++;
    //                 $band=true;
    //             }
    //         }
    //     }
    // }
    if(!isset($_SESSION['carrito'])){
    }
    else{
        $_SESSION['cuantos']=count($_SESSION['carrito']);
    }



        // if($_SESSION['carrito'][$i] == $nb){
        //     $i++;
        //     $listac=array(
        //         'idproducto'=>$_SESSION['carrito'][$i]['idproducto'],
        //         // 'idcategoria'=>$fila['idcategoria'],
        //         'descripcion'=>$_SESSION['carrito'][$i]['descripcion'],
        //         'precio'=>$_SESSION['carrito'][$i]['precio'],
        //         'cant'=>$_SESSION['carrito'][$i]['cant']
        //         // 'ruta'=>$fila['ruta']
        //         // 'stock'=>$id,
        //     );
        //         $_SESSION['carrito'][$j]=$listac;
        //         $j++;
        // }

    // }
    // echo  print_r($_SESSION['carrito'],true);
    // $salida = "";