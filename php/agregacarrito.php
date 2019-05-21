<?php
    session_start();
    $codi=$_POST['codi'];
    $_SESSION['can'] = $_POST['can'];
<<<<<<< HEAD
    $salida = "";

    $longitud=count($_SESSION['carrito']);
    $fila=$_SESSION['carrito'];
    // if($resultado -> num_rows > 0){
        $salida.= "<div class='card-deck'>
                    ";
        $count = 0;
        $count2=0;
        // while($fila=$resultado->fetch_assoc()){
            // $count2++;
            for ($o=0; $o<$longitud; $o++){
                $count2++;
            $salida.= "

                            <!-- Tarjeta de producto -->
                            <div class='card' style='width: 18rem;'>
                                <img src='./img/prod/".$fila[$o]['idproducto'].".jpg'  class='card-img-top img-fluid' alt='".$fila[$o]['descripcion']."'>
                                <div class='card-body '>
                                    <h5 class='card-title blurw'>".$fila[$o]['descripcion']."</h5>
                                    <p class='card-text blurw text-justify'>".$fila[$o]['precio'].".</p>
                                    <button type='button' href='#' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onmouseover='enviar(".$count2.")'>Me interesa...</button>
                                </div>
                            </div>

                    ";
                $count++;
                for ($i = $count; $i == 4; $i++) {
                    // cuando sean 4
                    $salida.="
                    </div>
                    <br>
                    <div class='card-deck'>
                    ";
                    // reinicia contador
                    $count=0;
                    $i=0;
                }
        }
        $salida.="<!-- ultimo -->
                </div>
                ";


    // else {
        // $salida.="No hay datos :c";
    // }
    echo $salida;
    
            
            
            
            
            
            
            
            
            
        //     if(!isset($_SESSION['carrito'])){
        //         $listac=array(
        //             'idproducto'=>$codi,
        //             // 'idcategoria'=>$fila['idcategoria'],
        //             'descripcion'=>$_SESSION['productos'][$codi]['descripcion'],
        //             'precio'=>$_SESSION['productos'][$codi]['precio']
        //             // 'ruta'=>$fila['ruta']
        //             // 'stock'=>$id,
        //         );
        //         $_SESSION['carrito'][0]=$listac;
        //     }
        //     else{
        //         $numeroPrdo=count($_SESSION['carrito']);
        //         $listac=array(
        //             'idproducto'=>$codi,
        //             // 'idcategoria'=>$fila['idcategoria'],
        //             'descripcion'=>$_SESSION['productos'][$codi]['descripcion'],
        //             'precio'=>$_SESSION['productos'][$codi]['precio']
        //             // 'ruta'=>$fila['ruta']
        //             // 'stock'=>$id,
        //         );
        //         $_SESSION['carrito'][$numeroPrdo]=$listac;
        //     }
        //     $_SESSION['cuantos']=count($_SESSION['carrito']);
        //    echo  print_r($_SESSION['carrito'],true);
=======
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
>>>>>>> a36e8f9202b43b72913cd7c027fbca340f14e9ac

?>