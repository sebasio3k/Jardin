<?php
    session_start();
    $conexion=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela");
    // guarda metodo de pago en varible de session
    $_SESSION['metodo']=$_POST['log'];
    // RESCATAR INFO DE cuantos producots hay en CARRITO
    $cuantosp = count($_SESSION['carrito']);
    //rescatar cuantos detallesv hay
    $sqldv = "SELECT * FROM detallev";
    $res=mysqli_query($conexion,$sqldv);
    $cuantosdv = $res->num_rows;
    if(!isset($_SESSION['cuantasor'])){
        $_SESSION['cuantasor']=0;
    }

    //------------


    //----------

    // require_once "conexion.php";
    // $conexion=conexion();

    // VERIFICAR SI HAY VENTAS EN LA BD
    $query = "SELECT * FROM ventas";
    // echo($query);
	$resultado = $conexion->query($query);
    if($resultado -> num_rows > 0){ //SI HAY
		if(!isset($_SESSION['ventas'])){
			$n=0;
        	while($fila=$resultado->fetch_assoc()){
                $listap=array(
                    'idventas'=>$fila['idventas'],
                    'idusuario'=>$fila['idusuario'],
                    'idmetodo'=>$fila['idmetodo'],
                    'fechacompra'=>$fila['fechacompra'],
                    'estado'=>$fila['estado'],
                    'total'=>$fila['total']
                );
                $_SESSION['ventas'][$n]=$listap;
                $n++;
            }
            $cuantasv = count($_SESSION['ventas']);
        }
        else{
            $cuantasv = count($_SESSION['ventas']);
        }
    }
    else{//no hay ventas
        echo " no hay ventas ";
        $cuantasv = 0;
    }
    echo (" ventas: ".$cuantasv." ");

    // $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    // $cons = "SELECT idventas FROM ventas";
    // $resultado = $mysqli->query($cons);
    // if($resultado -> num_rows > 0){
    //     while($fila=$resultado->fetch_assoc()){
    //         echo $fila;
    //     }
    // }

     //campos a insertar
     echo " met = ".$_SESSION['metodo']." ";
    //  if ($cuantasv==0){
    //     //  $idv = 0;
    // }
    // else{
    //     $query = "SELECT idventa FROM ventas";
	// $resultado = $conexion->query($query);
    // if($resultado -> num_rows > 0){ //SI HAY
	// 	if(!isset($_SESSION['ventas'])){
	// 		$n=0;
    //     	while($fila=$resultado->fetch_assoc()){
    //             $listap=array(
    //                 'idventas'=>$fila['idventas'],
    //                 'idusuario'=>$fila['idusuario'],
    //                 'idmetodo'=>$fila['idmetodo'],
    //                 'fechacompra'=>$fila['fechacompra'],
    //                 'fechaentrega'=>$fila['fechaentrega'],
    //                 'estado'=>$fila['estado'],
    //                 'total'=>$fila['total']
    //             );
    //             $_SESSION['ventas'][$n]=$listap;
    //             $n++;
    //         }
    //         $cuantasv = count($_SESSION['ventas']);
    //     $idv = $cuantasv + 1;
    // }
    $idu = $_SESSION['user']['idusuario'];
    $idm = 1;
    //fecha se inserta el dia de compra
     //$fe = ;
    $e = "proceso";
    $tot = $_SESSION['totalcompra'];

    // METODO PAGO EN TIENDA
    if($_SESSION['metodo']==1){
		// if(buscaRepetido($idv,$conexion)==1){
		// 	echo 2; //hay repetidos
        // }
        // else{

            // $inserta1=$mysqli->query("INSERT into ventas (idventas,idusuario,idmetodo,estado,total)
            //     values ('$idv','$idu','$idm','$e','$tot')");
            // require_once "conexion.php";
            // $conexion=conexion();
            //inserta la venta
            $sql1="INSERT INTO ventas (idusuario,idmetodo,estado,total) VALUES ($idu,$idm,'$e',$tot)";
            echo ($sql1);
            mysqli_query($conexion,$sql1);
            $sql1 = "SELECT * FROM ventas";
            $result=mysqli_query($conexion,$sql1);
            //si fue exitosa, inserta sus detalles
            // if($inserta1==true){
            if($result -> num_rows == ($cuantasv+1)){
                    $x=0;
                    while($fila=$result->fetch_assoc()){
                        $listap=array(
                            'idventas'=>$fila['idventas'],
                            'idusuario'=>$fila['idusuario'],
                            'idmetodo'=>$fila['idmetodo'],
                            'fechacompra'=>$fila['fechacompra'],
                            'estado'=>$fila['estado'],
                            'total'=>$fila['total']
                        );
                        $_SESSION['ventasn'][$x]=$listap;
                        $x++;
                    }
                    // print_r($_SESSION['ventasn']);
                    // $nid =count($_SESSION['ventasn']);
                    // echo $nid;
                    $vent = $_SESSION['ventasn'];
                    $idv = $vent[$x-1]['idventas'];
                    echo " idventa= ".$idv." ";
                    echo " cuantas veces ".$cuantosp;
                for($i=0; $i<$cuantosp; $i++){
                    //datos del carrito
                    $clv = $_SESSION['carrito'][$i]['idproducto'];
                    $cant = $_SESSION['carrito'][$i]['cant'];
                    $p = $_SESSION['carrito'][$i]['precio'];
                    $imp = $p*$cant;

                    // $inserta2=$mysqli->query("INSERT into detallev (idventa,claveprod,cantidad,precio,importe)
                    // values ('$idv','$clv','$cant','$p','$im')");
                    $sql2="INSERT into detallev (idventa,claveprod,cantidad,precio,importe)
                    values ($idv,$clv,$cant,$p,$imp)";
                    echo $sql2;
                    mysqli_query($conexion,$sql2);
                    $sql2 = "SELECT * FROM detallev";
                    $result=mysqli_query($conexion,$sql2);
                    if($result -> num_rows == ($cuantosdv+1)){
                        echo "insertado detv";
                    }
                    else{
                        echo " error en ins det v :CC ";
                    }
                }
                $_SESSION['carritou']=$_SESSION['carrito'];
                unset($_SESSION['carrito']);
                unset($_SESSION['ventas']);
                unset($_SESSION['cuantos']);
                unset($_SESSION['metodo']);
            }
            else{
                echo " error en la insercion :C ";
            }
                // echo $result=mysqli_query($conexion,$sql);
        // }
        $_SESSION['cuantasor']=$_SESSION['cuantasor']+1;
    }
    else{  // METODO PAGO CON TARJETA

    }


    $conexion->close();
?>