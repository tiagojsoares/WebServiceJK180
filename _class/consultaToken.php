<?php
 date_default_timezone_set('America/sao_paulo');
 $final= new DateTime();  
 $tempFinal = date_create();  
 $timestamp= $final->getTimestamp()-60;
 date_timestamp_set($tempFinal,$timestamp);
 $stampTimeLimit = intval(strtotime($limitToken= date_format($tempFinal,'Y-m-d H:i:s')));
 $login = $_SESSION['login'];
 $senha = md5($_SESSION['senha']);
 $token = $_SESSION['token'];

 




$connection = new db();
$conn = $connection->connect();

if(isset ($login) || isset($senha) && isset($token)){ 
  
  
  $sql = "select id_usuario from usuarios where nick_usuario = '$login' and senha_usuario = '$senha';";
  $query = mysqli_query($conn,$sql);
  $dados = mysqli_fetch_assoc($query);
  $id = $dados['id_usuario'];
  

  $sqlToken="select * from token where usuario_token = $id order by data_token desc";
  $queryToken = mysqli_query($conn,$sqlToken);
  $dadosToken = mysqli_fetch_assoc($queryToken); 
  $tokenq = $dadosToken['token'];  
  //convertendo para inteiro para comparação
  $agora= intval(strtotime( $dadosToken['data_token']));
  

if($agora<=$stampTimeLimit){
 
if($token === $tokenq){
    echo 'igual';   
    }
}
else{  
  //return "<teste>token 1 = $token e Token2= $tokenq</teste>";


if($token === $tokenq){ 
  $opt = $_SESSION['opt'];
  
switch ($opt) {
  case 'deletar':
 require_once('_dbm/delete.php');
 require_once('delete.php');
 $delet = new delete();
 
 $rs= $delet->qDelete($id); 
 //Array


 //Enviando Dados para O Form Dados Delete
 $dadosD= json_decode($rs,true);
 $print = $dadosD['text1'];
 $xml= FormDelete($print);
 //retornando XML
return $xml;
    break;
  
  default:
    # code...
    break;
}

//require_once("_class/inserir.php");
//$inserir = new inserir();

}

}

 
 
}
?>