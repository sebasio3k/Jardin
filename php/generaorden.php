<?php
    session_start();
    $_SESSION['metodo']=$_POST['log'];

    // require_once "conexion.php";
    // $conexion=conexion();
    $conexion=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela");
    $query = "SELECT * FROM ventas";
    // echo($query);
	$resultado = $conexion->query($query);

    if($resultado -> num_rows > 0){
		if(!isset($_SESSION['ventas'])){
			$n=0;
        	while($fila=$resultado->fetch_assoc()){
                $listap=array(
                    'idventas'=>$fila['idventas'],
                    'idusuario'=>$fila['idusuario'],
                    'idmetodo'=>$fila['idmetodo'],
                    'fechacompra'=>$fila['fechacompra'],
                    'fechaentrega'=>$fila['fechaentrega'],
                    'estado'=>$fila['estado'],
                    'total'=>$fila['total']
                );
                $_SESSION['ventas'][$n]=$listap;
                $n++;
            }
            $cuantasv = count($_SESSION['ventas']);
        }
    }
    else{//no hay ventas
        echo " no hay ventas ";
        $cuantasv = 0;
    }


    // $cuantosp = count($_SESSION['carrito']);
    // $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    // $cons = "SELECT idventas FROM ventas";
    // $resultado = $mysqli->query($cons);
    // if($resultado -> num_rows > 0){
    //     while($fila=$resultado->fetch_assoc()){
    //         echo $fila;
    //     }
    // }
        echo " met = ".$_SESSION['metodo']." ";
        if ($cuantasv==0){
            $idv = 0;
        }
        else{
            $idv = $cuantasv + 1;
        }
        //campos a insertar
        $idu = $_SESSION['user']['idusuario'];
        $idm = 1;
        //fecha se inserta el dia de compra
        //$fe = ;
        $e = "proceso";
        $tot = $_SESSION['totalcompra'];

    // METODO PAGO EN TIENDA
    if($_SESSION['metodo']==1){

		if(buscaRepetido($idv,$conexion)==1){
			echo 2; //hay repetidos
        }
        else{
            //inserta la venta
            // $inserta1=$mysqli->query("INSERT into ventas (idventas,idusuario,idmetodo,estado,total)
            //     values ('$idv','$idu','$idm','$e','$tot')");
            // require_once "conexion.php";
	        // $conexion=conexion();
            $sql1="INSERT INTO ventas (idusuario,idmetodo,estado,total) VALUES ($idu,$idm,'$e',$tot)";
            echo ($sql1);
            mysqli_query($conexion,$sql1);
            $sql1 = "SELECT * FROM ventas";
            $result=mysqli_query($conexion,$sql1);
            //si fue exitosa, inserta sus detalles
            // if($inserta1==true){
            if($result -> num_rows > 0){
                for($i=0; $i<$cuantosp; $i++){
                    //datos del carrito
                    $clv = $_SESSION['carrito'][$i]['idproducto'];
                    $cant = $_SESSION['carrito'][$i]['cant'];
                    $p = $_SESSION['carrito'][$i]['precio'];
                    $imp = $p*$c;

                    // $inserta2=$mysqli->query("INSERT into detallev (idventa,claveprod,cantidad,precio,importe)
                    // values ('$idv','$clv','$cant','$p','$im')");
                    $sql2="INSERT into detallev (idventa,claveprod,cantidad,precio,importe)
                    values ('$idv','$clv','$cant','$p','$im')";
                    $result=mysqli_query($conexion,$sql2);
                    if($result -> num_rows > 0){
                        echo "insertado detv";
                    }
                    else{
                        echo " error en ins det v :CC ";
                    }
                }

            }
            else{
                echo " error en la insercion :C ";
            }
			// echo $result=mysqli_query($conexion,$sql);
		}

    }
    else{  // METODO PAGO CON TARJETA

    }

    function buscaRepetido($id,$conexion){
        $sql="SELECT * from ventas
            where idventas='$id'";
        $result=mysqli_query($conexion,$sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }

    // $salida = "";
    // if(!isset($_SESSION['carrito'])){
    //     $salida.="No hay productos en su carrito";
    //     echo $salida;
    // }

    $conexion->close();
?>