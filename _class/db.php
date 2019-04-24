<?php
class db{
/* 
var $host = "localhost";
var $user = "controller";
var $pass = "admin";
var $base = "controller_bms";
/*/
//Banco de Dados Azure
var $host = "127.0.0.1:54261";
var $user = "azure";
var $pass = "6#vWHD_$";
var $base = "controller_bms";
var $conn = null;
//*/
function connect() {

     
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->base);
           
    
            if (!$this->conn) {             
        
          
                die('Sem conex�o com a base de dados. Por favor, entre em contato com a Controller BMS comunicando o departamento de desenvolvimento de sistemas.');

           
             


            } else {
                return $this->conn;
            }
    
        }
       
    
    }