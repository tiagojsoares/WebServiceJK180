<?php
class db
{
      

    function connect()
    {
        $servidor = $_SERVER['SERVER_NAME'];
        if ($servidor == 'localhost') {
            $host = "localhost";
            $user = "controller";
            $pass = "admin";
            $base = "controller_bms";
        } else {
            //Banco de Dados Azure
            $host = "127.0.0.1:54261";
            $user = "azure";
            $pass = "6#vWHD_$";
            $base = "controller_bms";
        }

        $this->conn = mysqli_connect($host, $user, $pass, $base);


        if (!$this->conn) {


            die('Sem conex�o com a base de dados. Por favor, entre em contato com a Controller BMS comunicando o departamento de desenvolvimento de sistemas.');
        } else {
            
            return $this->conn;
        }
    }
}


