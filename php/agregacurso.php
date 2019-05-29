<?php
    $codi=$_POST['n'];
    $bandera=false;
    session_start();
    // echo " num boton: ".$codi." |";
    $conexion=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela");
    $idu = $_SESSION['user']['idusuario'];
    $idc = $codi;

    // Busca en bd
    $sql1 = "SELECT * FROM inscripciones WHERE idusuario = $idu";
    $result=mysqli_query($conexion,$sql1);
    $x=0;
    if($result -> num_rows > 0){
        while($fila=$result->fetch_assoc()){
            $listac=array(
                'idins'=>$fila['idins'],
                'idusuario'=>$fila['idusuario'],
                'idcurso'=>$fila['idcurso'],
            );
            $_SESSION['cursosu'][$x]=$listac;
            $x++;
        }
        // echo "<br> cursos de us  <br>";
        // print_r($_SESSION['cursosu']);
    }
    else{
        
    }

    // RESCATAR INFO DE cuantos inscripciones hay en BD
    // if(!isset($_SESSION['cursosu'])){
        // $sqlin = "SELECT count(*) FROM inscripciones WHERE idusuario = $idu";
        // // echo("  ".$sqlin);
        // // $resultado2 = $mysqli->query($sqlin);
        // if ($resultado2 = $conexion->query($sqlin)) {
        //     $filax = $resultado2->fetch_row();
        //     // printf(" insc: ".$filax[0]);
        //     // $_SESSION['cuantasin'][0]=$filax[0];
            // $cuantasins = 0;
        // }
        // $cuantasins = $_SESSION['cuantasin'][0];
        // echo " varcuantasins= ".$cuantasins;
    // }
    // else{
        // $cuantasins=count($_SESSION['cursosu']);
    // }
    // echo $cuantasins;
    // $longitud=count($_SESSION['carrito']);
    // $_SESSION['carrito']=$longitud;

    // si es la primera vez que se inscribe a un curso:
    if(!isset($_SESSION['cursosu'])){
        $cuantasins = 0;
        // $cuantosc=count($_SESSION['cursosu']);
        $listac=array(
            'idusuario'=>$idu,
            'idcurso'=>$codi,
        );
        // $listac=array(
        //     'idcurso'=>$codi,
        //     'nombrecurso'=>$_SESSION['cursos'][$codi-1]['nombrecurso'],
        //     'descripcion'=>$_SESSION['cursos'][$codi-1]['descripcion'],
        //     'precio'=>$_SESSION['cursos'][$codi-1]['precio'],
        //     'fecha'=>$_SESSION['cursos'][$codi-1]['fecha']
        // );
        // recorrer vector PARA VER SI HAY UN curso IGUAL
        // for($i=0; $i<$cuantasins; $i++){
        //     // if($_SESSION['carrito'][$i]['idproducto']==$_SESSION['carrito'][$i+1]['idproducto']){
        //     if($_SESSION['cursosu'][$i]['idcurso']==$listac['idcurso']){//curso inscrito
        //         $bandera=true;
        //         break;
        //     }
        //     else{
        //         //SIGUE RECORRIENDO
        //     }
        // }
        // if($bandera){
            // echo "Ya estás inscrito a este curso";
            // echo " ya inscrito pv ";
            // echo 2;
            // $conexion->close();
        // }
        // else{
            
            //inserta la inscripcion
            $sql1="INSERT INTO inscripciones (idusuario,idcurso) VALUES ($idu,$idc)";
            // echo ($sql1);
            mysqli_query($conexion,$sql1);
            $sql1 = "SELECT * FROM inscripciones WHERE idusuario = $idu ";
            $result=mysqli_query($conexion,$sql1);
            //si fue exitosa, inserta sus detalles
            // if($inserta1==true){
            if($result -> num_rows == (intval($cuantasins)+1)){
                $_SESSION['cursosu'][0]=$listac;
                $cuantasins =  $cuantasins +1 ;
                //inscripcion ok
                // echo " inscrito pv ";
                echo 1;
                // echo "<br> cursos de usn  <br>";
                // print_r($_SESSION['cursosu']);
                $conexion->close();
                    //  $x=0;
                    //  while($fila=$result->fetch_assoc()){
                    //     $listac=array(
                    //         'idcurso'=>$codi,
                    //         'nombrecurso'=>$_SESSION['cursos'][$codi-1]['nombrecurso'],
                    //         'descripcion'=>$_SESSION['cursos'][$codi-1]['descripcion'],
                    //         'precio'=>$_SESSION['cursos'][$codi-1]['precio'],
                    //         'fecha'=>$_SESSION['cursos'][$codi-1]['fecha']
                    //      );
                    //      $_SESSION['cursosu'][0]=$listac;
                    //      $x++;
                    //  }
                    // print_r($_SESSION['ventasn']);
                    // $nid =count($_SESSION['ventasn']);
                    // echo $nid;
            }
            else{
                echo 2;
                $conexion->close();
            }
        // }
    }
    else{
        $cuantasins=count($_SESSION['cursosu']);
        $listac=array(
            'idusuario'=>$idu,
            'idcurso'=>$codi,
        );
        // recorrer vector PARA VER SI HAY UN curso IGUAL
        for($i=0; $i<$cuantasins; $i++){
            // if($_SESSION['carrito'][$i]['idproducto']==$_SESSION['carrito'][$i+1]['idproducto']){
            if($_SESSION['cursosu'][$i]['idcurso']==$listac['idcurso']){//curso inscrito
                $bandera=true;
                break;
            }
            else{
                //SIGUE RECORRIENDO
            }
        }
        if($bandera){

            // echo "Ya estás inscrito a este curso";
            // echo " ya inscrito sv ";
            echo 2;
            $conexion->close();
        }
        else{
            $_SESSION['cursosu'][$cuantasins]=$listac;
            //inserta la inscripcion
            $sql1="INSERT INTO inscripciones (idusuario,idcurso) VALUES ($idu,$idc)";
            // echo ($sql1);
            mysqli_query($conexion,$sql1);
            $sql1 = "SELECT * FROM inscripciones WHERE idusuario = $idu";
            $result=mysqli_query($conexion,$sql1);
            //si fue exitosa, inserta sus detalles
            // if($inserta1==true){
            if($result -> num_rows == ($cuantasins+1)){
                //inscripcion ok
                // echo " inscrito sv ";
                echo 1;
                // echo "<br> cursos de usn  <br>";
                // print_r($_SESSION['cursosu']);
                $conexion->close();
            }
            else{
                // echo " ya inscrito sv ";
                echo 2;
                $conexion->close();
            }
        }
    }
    // echo  print_r($_SESSION['cursosu'],true);
    // $conexion->close();

?>