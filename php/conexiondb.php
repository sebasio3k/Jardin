<?php
    class conexiondb{
        public function getConexion(){
            return $cnx=mysqli_connect("localhost","Sebastian","ifuseekamy","jardinabuela");
        }
    }
?>