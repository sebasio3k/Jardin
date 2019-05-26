<?php

    session_start();
    // $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";

    $longitud=count($_SESSION['cursos']);
    $fila=$_SESSION['cursos'];
    echo "<br> cursos <br>";
    print_r($_SESSION['cursos']);
    echo "<br> cuantos <br>";
    echo ($longitud);
    // if($resultado -> num_rows > 0){
        $salida.= "<div class='card-deck'>
                    ";
        $count = 0;
        $count2=0;
        // while($fila=$resultado->fetch_assoc()){
            // $count2++;
            for ($o=0; $o<$longitud; $o++){
                // echo $fila[$o]['idcurso'];
                $count2++;
                $salida.= "

                            <!-- Tarjeta de producto -->
                            <div class='card' style='width: 18rem;'>
                                <img src='./img/curso/".$fila[$o]['idcurso'].".jpg'  class='card-img-top img-fluid' alt='".$fila[$o]['descripcion']."'>
                                <div class='card-body '>
                                    <h3 class='card-title blurw'>".$fila[$o]['nombrecurso']."</h3>
                                    <h5 class='card-title blurw'>".$fila[$o]['descripcion']."</h5>
                                    <p class='card-text blurw text-justify'>".$fila[$o]['precio'].".</p>
                                    <p class='card-text blurw text-justify'>Empezamos el: ".$fila[$o]['fecha'].".</p>
                                    <button type='button' href='#' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='enviar(".$count2.")'>Inscribirme.</button>
                                </div>
                            </div>

                    ";
                    // si da clic en boton envia num producto a funcion enviar en 2_cursos2.php------------------
                $count++;
                for ($i = $count; $i == 3; $i++) {
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
?>
