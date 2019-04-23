<?php
class db{


var $host = "localhost";
var $user = "controller";
var $pass = "admin";
var $base = "controller_bms";
var $conn = null;

function connect() {

     
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->base);
           
    
            if (!$this->conn) {      
              
              // PHP Data Objects(PDO) Sample Code:
try {
  $conn = new PDO("sqlsrv:server = tcp:sqlservertg.database.windows.net,1433; Database = webservice", "administrador", "P@ssw0rd123");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  print("Error connecting to SQL Server.");
  die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "administrador@sqlservertg", "pwd" => "P@ssw0rd123", "Database" => "webservice", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqlservertg.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);







        
          
                //die('Sem conex�o com a base de dados. Por favor, entre em contato com a Controller BMS comunicando o departamento de desenvolvimento de sistemas.');

           
             


            } else {
                return $this->conn;
            }
    
        }
       
    
    }