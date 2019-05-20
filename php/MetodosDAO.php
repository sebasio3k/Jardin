<?php

    include 'conexiondb.php';

    class MetodosDAO{
        public function ListarProductos(){
            $cnx=new conexiondb();
            $cn=$cnx->getConexion();

            $res=$cn->prepare("SELECT * FROM productos");
            $res->execute();

            foreach($res as $row){
                $lista[]=$row;
            }
            return $lista;
        }

        public function ListarProductosCod($cod){
            $cnx=new conexiondb();
            $cn=$cnx->getConexion();

            $res=$cn->prepare("SELECT * FROM productos WHERE idproducto = $cod");
            $res->execute();

            foreach($res as $row){
                $lista[]=$row;
            }
            return $lista;
        }

    }

?>