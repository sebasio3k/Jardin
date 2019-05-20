<?php

    session_start();

    $lista=$_SESSION['lista'];

    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT idproducto,idcategoria,descripcion,precio FROM productos WHERE idproducto";
    // echo($query);
    $resultado = $mysqli->query($query);

    $x=0;
    foreach($lista as $reg){
        if($x==3){
            // $echo "<tr>";
            // $num=1;
        }
        else{
            // $num++;
        }
    }

    if($resultado -> num_rows > 0){
        $salida.= "<div class='card-deck'>
                    ";
        $count = 0;
        $count2=0;
        while($fila=$resultado->fetch_assoc()){
            $count2++;
            $salida.= "

                            <!-- Tarjeta de producto -->
                            <div class='card' style='width: 18rem;'>
                                <img src='./img/prod/".$fila['idproducto'].".jpg'  class='card-img-top img-fluid' alt='".$fila['descripcion']."'>
                                <div class='card-body '>
                                    <h5 class='card-title blurw'>".$fila['descripcion']."</h5>
                                    <p class='card-text blurw text-justify'>".$fila['precio'].".</p>
                                    <button type='button' href='#' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onmouseover='enviar(".$count2.")'>Agregar al carrito</button>
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

    }
    else {
        $salida.="No hay datos :c";
    }
    echo $salida;
    $mysqli->close();
?>
