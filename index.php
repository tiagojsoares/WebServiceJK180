<?php
session_start();
require_once('_class/db.php');
$text1='';

if(isset($_GET['token'])){

if(isset($_GET['action']) && isset($_GET['login']) && isset($_GET['senha'])){
  $token = $_GET['token'];
  $option=$_GET['action'];
  $login=$_GET['login'];$senha=$_GET['senha'];
  $text1=($_GET);
 
  $options = array(
    'uri' => 'http://localhost/_class/servidor.php',
    'location' => 'http://localhost/_class/servidor.php'
  );
  
  $client = new SoapClient(null, $options);  
  $client->Text1($text1,$token);
  $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
  $arquivo_xml .= $client->opt($option,$login,$senha,$token);  
 
  
  header('Content-Type: application/xml; charset=utf-8');
  print_r($arquivo_xml);
  
  
  

}
else{
  $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
  $arquivo_xml.='<ERRO> Ocorreu um erro verifique usuário, senha, action e os campos digitados</ERRO>';
  header('Content-Type: application/xml; charset=utf-8');
  print($arquivo_xml);
} 
  
  

}
else{

  if(isset($_GET['action']) && isset($_GET['login']) && isset($_GET['senha'])){
    $token = 'null';
    $option=$_GET['action'];
    $login=$_GET['login'];$senha=$_GET['senha'];
   
    $options = array(
      'uri' => 'http://localhost/_class/servidor.php',
      'location' => 'http://localhost/_class/servidor.php'
    );
    
    $client = new SoapClient(null, $options);
  
    $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
    $arquivo_xml .= $client->opt($option,$login,$senha,$token);   
    
  
    header('Content-Type: application/xml; charset=utf-8');
    print_r($arquivo_xml);
      
    
    
   // echo $client->opt($option,$login,$senha);
  }
  else{
    $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
    $arquivo_xml.='<ERRO> Ocorreu um erro verifique usuário, senha, action e os campos digitados</ERRO>';
    header('Content-Type: application/xml; charset=utf-8');
    print($arquivo_xml);
  }
  
  
      
}




  
  







