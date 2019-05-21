<?php
<<<<<<< HEAD
    // include("conexion.php");
    // $id = $_POST['buscar'];

    session_start();

    $codi=$_REQUEST['cod'];
    // $can = $_SESSION['can'];
    $_SESSION['codigo']=$codi;
    $listap = $_SESSION['productos'];
    $salida = "";
    $longitud=count($_SESSION['productos']);
    $nombre=$_SESSION['productos'][$codi]['descripcion'];
    $precio=$_SESSION['productos'][$codi]['precio'];

    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $salida = "";
    $query = "SELECT * FROM cursos ORDER BY idcurso";
    $q="";
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT idcurso,nombrecurso,descripcion,precio,fecha FROM cursos WHERE idcurso LIKE '%".$q."%' OR nombrecurso LIKE '%".$q."%' OR precio LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

    // if ($resultado == ""){

    // }
    // else {
    if($q==""){

    }
    else{
        if($resultado -> num_rows > 0){
            $salida.= "<table class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Nombre Curso</th>
                                    <th scope='col'>Descripción</th>
                                    <th scope='col'>Precio</th>
                                </tr>
                            </thead>
                            <tbody>";
            while($fila=$resultado->fetch_assoc()){
                $salida.= "<tr>
                            <td>".$fila['idcurso']."</td>
                            <td>".$fila['nombrecurso']."</td>
                            <td>".$fila['descripcion']."</td>
                            <td>".$fila['precio']."</td>
                            </tr>";
            }
            $salida.="</tbody></table>";
=======
    session_start();
    $salida = "";
    if(!isset($_SESSION['carrito'])){
        $salida.="No hay productos en su carrito";
        echo $salida;
    }
    else {
        $longitud=count($_SESSION['carrito']);
        $fila=$_SESSION['carrito'];
        print_r($fila);

        if($longitud>0){
            // for ($o=0; $o==$longitud; $o++){
                $salida.= "<table class='table bgblanco textcolorb table-responsive table-striped table-bordered table-sm'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Producto</th>
                                        <th scope='col'>Descripción</th>
                                        <th scope='col'>Precio</th>
                                        <th scope='col'>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>";
                    for ($i = 0; $i < $longitud; $i++) {
                        $salida.= "<tr>
                                        
                                        <td scope='row'>".$fila[$i]['descripcion']."</td>
                                        <td>".$fila[$i]['precio']."</td>
                                        <td>".$fila[$i]['cant']."</td>
                                        <td><img src='./img/prod/".$fila[$i]['idproducto'].".jpg'  class='card-img-top img-fluid'  alt='".$fila[$i]['descripcion']."'></td>
                                </tr>";
                    }
            // }
            $salida.="</tbody></table>";
            echo $salida;
>>>>>>> a36e8f9202b43b72913cd7c027fbca340f14e9ac
        }
        else {
            $salida.="No hay datos :c";
        }
<<<<<<< HEAD
    // }
    }
    echo $salida;
    $mysqli->close();
=======
    }
>>>>>>> a36e8f9202b43b72913cd7c027fbca340f14e9ac
?>