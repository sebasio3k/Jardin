<?php
    session_start();

	include_once 'conecta.php';
    $mysqli = conecta();
    // if(!isset($_SESSION['consiu'])){
    //CREAR VARIABLE DE SESION ventas PARA UTILZIARLA DESPUES
    $idus = $_SESSION['user']['idusuario'];
    $query = "SELECT * FROM inscripciones WHERE idusuario = $idus";
    echo($query);
    $resultado = $mysqli->query($query);
    if($resultado -> num_rows > 0){
			$m=0;
        	while($fila=$resultado->fetch_assoc()){
                $listac=array(
                    'idins'=>$fila['idins'],
                    'idusuario'=>$fila['idusuario'],
                    'idcurso'=>$fila['idcurso'],
                );
                // guarda venta en la posicion n
                $_SESSION['consiu'][$m]=$listac;
                echo "<br>";
                $m++;
            }
            echo "<br> cursos: <br>";
            print_r($_SESSION['consiu']);
            $cuantasi = count($_SESSION['consiu']);
            // echo "<br> ventas u <br>";
            // print_r($_SESSION['ventasu']);
    }
    else{
        echo "No se ha inscrito en ningún curso";
        $cuantasi = 0;;
    }
    echo " | <br>";

    $mysqli->close();
    
    echo " <br> cuantas insc: <br>".$cuantasi;
    echo "<br> cursos: <br>";
    print_r($_SESSION['cursos']);

 //****************************************************************** */

    $salida = "";
    if($cuantasi == 0){
        $salida.="No hay se ha inscrito en ningún curso";
        echo $salida;
    }
    else {
        //guarda vecto consiu  del usuario en fila
        $fila=$_SESSION['consiu'];
        // $fila2=$_SESSION['detallesu'];
        // print_r($fila2);
        //guarda vector de cuantos detalles tiene cada venta del usuario en numdet
        // $numdet = $_SESSION['numdet'];
        // $_SESSION['totalcompra']=0;
        // print_r($fila);

        if($cuantasi>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table id='tablaor' class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th colspan='5'>INSCRIPCIONES</th>
                                    </tr>
                                    <tr>
                                        <th colspan='1' scope='col'>Codigo Curso</th>
                                        <th scope='col'>Nombre</th>
                                        <th scope='col'>Descripcion</th>
                                        <th scope='col'>Precio</th>
                                        <th scope='col'>Inicia en</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $cuantasi; $i++) {
                        $v= $_SESSION['consiu'][$i]['idcurso'];
                        // $ncurso = $v;
                        $salida.= "<tr>
                                        <td colspan='1' scope='row'>".$fila[$i]['idcurso']."</td>
                                        <td scope='row'>".$_SESSION['cursos'][$v-1]['nombrecurso']."</td>
                                        <td scope='row'>".$_SESSION['cursos'][$v-1]['descripcion']."</td>
                                        <td scope='row'>".$_SESSION['cursos'][$v-1]['precio']."</td>
                                        <td scope='row'>".$_SESSION['cursos'][$v-1]['fecha']."</td>
                            </tr>";
                    }
            $salida.="</tbody></table> ";
            echo $salida;
        }
        else {
            $salida.="No hay se ha inscrito en ningún curso";
        }
    }
?>