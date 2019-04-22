<?php
 date_default_timezone_set('America/sao_paulo');
 require_once('_dbm/insert.php'); 
 
 $final= new DateTime();  
 $tempFinal = date_create();  
 $timestamp= $final->getTimestamp()-50000;
 date_timestamp_set($tempFinal,$timestamp);
 $stampTimeLimit = intval(strtotime($limitToken= date_format($tempFinal,'Y-m-d H:i:s')));
 $login = $_SESSION['login'];
 $senha = md5($_SESSION['senha']);
 $token = $_SESSION['token'];
 $insertp= new InserirP();
 $rsToken = $insertp->ValidaToken($token);
 ///validando Token antes das funções
 if($rsToken === '1'){
return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
 }


$connection = new db();
$conn = $connection->connect();

if(isset ($login) || isset($senha) || isset($token)){
  
  
  $sql = "SELECT * FROM Token WHERE token = $token";
  $query = mysqli_query($conn,$sql);
  $dados = mysqli_fetch_assoc($query);
  $id = $dados['usuario_token'];
 
  if($id==='' || $token==='' && $token===''){
  return "<Erro>Verifique o usuario e Senha ou Token</Erro>";
  }
  
  $sqlToken="SELECT * FROM Token WHERE token = $token";
  $queryToken = mysqli_query($conn,$sqlToken);
  $dadosToken = mysqli_fetch_assoc($queryToken); 
  $tokenq = $dadosToken['token'];
  
  //convertendo para inteiro para comparação
  $agora= intval(strtotime( $dadosToken['data_token']));
  
  
if($agora<=$stampTimeLimit){
 
if($token === $tokenq){
    return  '<erro>Token Invalido ou experirado por favor gerar outro token</erro>';   
    }
    else{
      return "<erro>Token Invalido ou experirado por favor gerar outro token</erro>";
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
 ///função atualizando tabela do token para token utilizado

$rsToken = $insertp->ValidaToken($token);
///validando Token antes das funções
if($rsToken === '1'){
return "<Token> Este jaToken Foi utlizado, Favor gerar um novo </Token>";
}
////////////////////////////////////////////////
 $insertp->fechaToken($token);
 $delet = new delete(); 
 $rs= $delet->qDelete($id); 
 //Array
 //Enviando Dados para O Form Dados Delete
 $dadosD= json_decode($rs,true);
 $print = $dadosD['Text1'];
 $xml= FormDelete($print);
 //retornando XML
return $xml;
break;

///Caso Escolha Seja Inserir
case 'inserir':
//chamando funções
require_once('inserir.php');
require_once('_dbm/insert.php'); 
require_once('_dbm/ValidaDados.php');



////////////
$insertp= new InserirP();
$rs = $insertp->qInsertP($id);
$dados=json_decode($rs,true);
$delete = $dados['text1'];


/////Removendo campos para não utilizados
unset($dados['action']);unset($dados['senha']);unset($dados['token']);unset($dados['login']);
$keys = array_keys($dados);
/////Validando Todos os Campos
$valida = new ValidaDados();
if($valida->ValidaInsert($dados)){
  return $valida->ValidaInsert($dados);
}
///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);

//retornando Valores
return $xml=inserirxml($dados,$keys,'Default',$delete);



break;
case 'incluiracesso':
require_once('inserir.php');
require_once('NivelAcesso.php');
$insertp= new InserirP();
$nivelAcesso = new NivelAcesso();
$_SESSION['token']=$tokenG;

if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
   }
$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);
///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);
/////Retornando
return $nivelAcesso->FormNivelInsert($dados,'Default');
break;
/////////////////////////////////////////////////////////////////////////
///////////////////Deletando Nivel de Acesso

case 'excluiracesso':
require_once('NivelAcesso.php');
$insertp= new InserirP();
require_once('inserir.php');
$nivelAcesso = new NivelAcesso();
$_SESSION['token']=$tokenG;

if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
   }
$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);
///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);

return $nivelAcesso->FormNivelInsert($dados,'Delete');
break;
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
case 'alterar':
require_once('inserir.php');
require_once('NivelAcesso.php');
$nivelAcesso = new NivelAcesso();
$_SESSION['token']=$tokenG;
$insertp= new InserirP();

if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
}

$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);

///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);

return $nivelAcesso->AlterarPerso($dados,'Default');
break;
/////////////////////Funções relacioando ao Cartão de Acesso
case 'cartaoinserir':
require_once('inserir.php');
$insertp= new InserirP();
require_once('NivelAcesso.php');
$nivelAcesso = new NivelAcesso();
$_SESSION['token']=$tokenG;
if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
   }

$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);

///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);

return $nivelAcesso->Cartao($dados,'Default');
break;
////////////////////////////////////////////////
case 'cartaodeletar':
require_once('NivelAcesso.php');
$nivelAcesso = new NivelAcesso();
require_once('inserir.php');
$insertp= new InserirP();
$_SESSION['token']=$tokenG;
if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
   }

$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);

$insertp->fechaToken($token);
return $nivelAcesso->Cartao($dados,'Delete');


break;

//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////
case 'cartaoalterar':
require_once('NivelAcesso.php');
$insertp= new InserirP();
require_once('NivelAcesso.php');
$nivelAcesso = new NivelAcesso();
$_SESSION['token']=$tokenG;
if($rsToken === '1'){
  return "<Token> Esse Token ja Foi utlizado Favor gerar um novo </Token>";
   }

$rs = $nivelAcesso->qNivel($id);
$dados=json_decode($rs,true);

$nivelAcesso->Cartao($dados,'Delete');
///função atualizando tabela do token para token utilizado
$insertp->fechaToken($token);

return $nivelAcesso->Cartao($dados,'Default');

break;

//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
  default:
  return "<ERRO> Digite uma Action Valida </ERRO>";
    break;
}

//require_once("_class/inserir.php");
//$inserir = new inserir();

}
else{
  
  return $er.'<Erro>Token Invalido</Erro>';
}

}

 
 
}

?>