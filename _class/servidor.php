<?php
require_once('db.php');
$servidor = $_SERVER['SERVER_NAME'];



$options = array(
    'uri' => "http://$servidor/_class/servidor.php"
);

$server = new SoapServer(null, $options);
	
class MinhaInterfaceSoap
{
   
    public function opt ($option,$login,$senha,$token){
      
      require_once('opt.php');
        $opt = new option();
         return $opt ->action($option,$login,$senha,$token);             
        
        
    }
    public function Text1($text1,$token){     
       require_once("_dbm/delete.php");
       $delete = new delete();       
       $delete->insertLog($text1,$token);       
    }
}


$server->setObject(new MinhaInterfaceSoap());

$server->handle();


