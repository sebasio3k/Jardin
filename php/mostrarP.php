<?php

    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT idproducto,idcategoria,descripcion,precio FROM productos WHERE idproducto";
    // echo($query);
    $resultado = $mysqli->query($query);

    if($resultado -> num_rows > 0){
        $salida.= "<div class='card-deck'>
                    ";
        $count = 0;
        while($fila=$resultado->fetch_assoc()){
            $salida.= "

                            <!-- Tarjeta de producto -->
                            <div class='card' style='width: 18rem;'>
                                <img src='./img/prod/".$fila['idproducto'].".jpg'  class='card-img-top img-fluid' alt='".$fila['descripcion']."'>
                                <div class='card-body '>
                                    <h5 class='card-title blurw'>".$fila['descripcion']."</h5>
                                    <p class='card-text blurw text-justify'>".$fila['precio'].".</p>
                                    <a href='#' class='btn btn-primary'>Ver Información</a>
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



