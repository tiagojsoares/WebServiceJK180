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
                die('Sem conex�o com a base de dados. Por favor, entre em contato com a Controller BMS comunicando o departamento de desenvolvimento de sistemas.');
            } else {
                return $this->conn;
            }
    
        }
       
    
    }