<?php
date_default_timezone_set('America/sao_paulo');
session_start();
require_once('_class/db.php');
$text1 = '';
if (isset($_GET['WSDL']) || isset($_GET['wsdl'])) {

  if (isset($_GET['token'])) {


    if (isset($_GET['action'])) {
      $token = $_GET['token'];
      $option = $_GET['action'];
      if (isset($_GET['login'])) {
        return $login = $_GET['login'];
      } else {
        $login = "";
      }
      if (isset($_GET['login'])) {
        return $senha = $_GET['senha'];
      } else {
        $senha = "";
      }


      $text1 = ($_GET);
      $options = array(
        'uri' => 'http://localhost/_class/servidor.php',
        'location' => 'http://localhost/_class/servidor.php'
      );

      $client = new SoapClient(null, $options);
      $client->Text1($text1, $token);

      $arquivo_xml = $client->opt($option, $login, $senha, $token);
      header('Content-Type: application/xml; charset=utf-8');


      print_r(utf8_decode($arquivo_xml));
    } else {
      $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
$arquivo_xml .= '<ERRO> Ocorreu um erro verifique usuário, senha, action e os campos digitados</ERRO>';
header('Content-Type: application/xml; charset=utf-8');
print($arquivo_xml);
}
} else {

if (
isset($_GET['action']) && isset($_GET['login']) &&
isset($_GET['senha'])
) {
$token = 'null';
$option = $_GET['action'];
$login = $_GET['login'];
$senha = $_GET['senha'];

$options = array(
'uri' => 'http://localhost/_class/servidor.php',
'location' => 'http://localhost/_class/servidor.php'
);

$client = new SoapClient(null, $options);

$arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
$arquivo_xml .= $client->opt($option, $login, $senha, $token);
header('Content-Type: application/xml; charset=utf-8');
print_r($arquivo_xml);



// echo $client->opt($option,$login,$senha);
} else {
$arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
$arquivo_xml .= '<ERRO> Ocorreu um erro verifique usuario, senha, action e os campos digitados</ERRO>';
header('Content-Type: application/xml; charset=utf-8');
print($arquivo_xml);
}
}
} else {


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebService-JK180</title>
    <link rel="stylesheet" href="_css/style.css">
    <link rel="stylesheet" href="_css/Anton-Regular.ttf">
    <link rel="stylesheet" href="_css/_font/Roboto-Medium.ttf">

</head>

<body>
    <div id="navbar">
        <div class="logo"><img src="_images/controller-bms.gif"></div>
        <div class="menu">WebService-JK180</div>

        <div class="login" id="login"><a href="">Login</a></div>

        <div class="login" id="logout" style="display: none;"><a href="">Logout</a></div>
        <div class="login" id="new" style="display: none"><a href="">Criar Usuario</a></div>
        <div class="login" id="tutorial"><a href="">Tutorial</a></div>
        <div class="login" id="param"><a href="">Parâmetros</a></div>
        <div class="login" id="esconder"><a href="">Parâmetros</a></div>

    </div>
    <div class="tutorial">
        <form action="" id="form">
            <div class="log">
                <ul>
                    <li><input type="text" name="login" id="user" placeholder="Login"></li>
                    <li><input type="password" name="password" id="password" style="margin-top: 1%" placeholder="Senha">
                    </li>
                </ul><input type="submit" id="enviar" value="Login"
                    style="margin-left: 50%;margin-top: 1%;margin-bottom: 5%">
            </div>
        </form>

        <form action="" id="formNew">
            <div class="logNew">
                <ul>
                    <li><input type="text" name="nome" id="nome" placeholder="Nome"></li>
                    <li><input type="text" name="login" id="userNew" placeholder="Login"></li>
                    <li><input type="password" name="password" id="passwordNew" style="margin-top: 1%"
                            placeholder="Senha"></li>
                </ul><input type="submit" id="enviarNew" value="Criar Novo Usuario"
                    style="margin-left: 28%;margin-top: 3%;margin-bottom: 5%">
            </div>
        </form>
        <h1>Tutorial</h1>

        <p>
            <li>Primeiro passo é necessário ter um usuário cadastrado no
                banco de dados. <br></li>
            <li>Para criar um novo usuário é necessário realizar login na
                página http://dominio/index.php em seguida clique
                em “Criar Usuario”</li>
            <li>Para gerar um novo token https://dominio/?wsdl&action=gerarToken&login=user&senha=senha</li>
            <li>Para Inserir um novo usuario:
                "https://dominio/?wsdl&action=inserir&token=NovoToken&Parâmetros=Dados"</li>
            <li>Para Alterar dados relacionado ao usuario como nome, sobrenome, função, nivel de acesso (ClearanceKey), CPF etc.. 
            https://dominio/?wsdl&action=alterar&token=TokenValido&Text1=CampoObrigatorio&Parametros=dadosParametros
            </li>
            <li>Para deletar um usuario  https://dominio/?wsdl&action=deletar&token=TokenValido&Text1=CampoObrigatorio </li>
            <li>Para incluir um novo nivel de acesso a um usuario já cadastrado  https://dominio/?wsdl&action=incluiracesso&token=TokenValido&Text1=CampoObrigatorio&ClearanceKey=NivelDeAcesso</li>
            <li>Para retirar um nivel de acesso de um usuario cadastrado https://dominio/?wsdl&action=excluiracesso&token=TokenValido&Text1=CampoObrigatorio&ClearanceKey=NivelDeAcesso</li>
            <li>Para Adicionar um cartão a um usuario  https://dominio/?wsdl&action=cartaoinserir&token=TokenValido&Text1=CampoObrigatorio&CardNumber=numero do Cartao</li>
            <li>Para remover um cartão a um usuario  https://dominio/?wsdl&action=cartaodeletar&token=TokenValido&Text1=CampoObrigatorio&CardNumber=numero do Cartao</li>
            <li>Para alterar um cartão a um usuario  https://dominio/?wsdl&action=cartaoalterar&token=TokenValido&Text1=CampoObrigatorio&Novo=Cartao Novo&Antigo=Cartao antigo</li>


        </p>
        
       

        <table>
            <tr>
                <th>Parametros</th>
                <th>Função</th>

            </tr>
          
            <tr>
                <td>FirstName</td>
                <td>Primeiro Nome
                </td>
            </tr>
            <tr>
                <td>LastName
                </td>
                <td>Sobrenome Completo
                </td>
            </tr>
            <tr>
                <td>PersonnelType
                </td>
                <td>Tipo de Pessoa : VISITANTE | CONDÔMINOS </td>
            </tr>
            <tr>
                <td>Clearance</td>
                <td>Nivel de Acesso: Pepsico ou Visitante
                </td>
            </tr>
            <tr>
                <td>Text1
                </td>
                <td>Matrícula
                </td>
            </tr>
            <tr>
                <td>CardNumber
                </td>
                <td>Numero do Cartão
                </td>
            </tr>
            <tr>
                <td>Text2
                </td>
                <td>Telefone/Ramal
                </td>
            </tr>
            <tr>
                <td>Text3
                </td>
                <td>Empresa (Unidade)
                </td>
            </tr>
            <tr>
                <td>Text4
                </td>
                <td>Observação
                </td>
            </tr>
            <tr>
                <td>Text5
                </td>
                <td>RG (Documento)
                </td>
            </tr>
            <tr>
                <td>Text6
                </td>
                <td>CPF (Documento)
                </td>
            </tr>
            <tr>
                <td>Text7
                </td>
                <td>Departamento
                </td>
            </tr>
            <tr>
                <td>Text8
                </td>
                <td>Responsável
                </td>
            </tr>
            <tr>
                <td>Text9
                </td>
                <td>E-mail
                </td>
            </tr>
            <tr>
                <td>Text10
                </td>
                <td>Conjunto/Bloco
                </td>
            </tr>            
            <tr>
                <td>Text15
                </td>
                <td>Cargo
                </td>
            </tr>
            <tr>
                <td>Text17
                </td>
                <td>Período de Afastamento
                </td>
            </tr>
            <tr>
                <td>Text18
                </td>
                <td>Sexo
                </td>
            </tr>
            <tr>
                <td>Text19
                </td>
                <td>Endereço
                </td>
            </tr>
            <tr>
                <td>Text20
                </td>
                <td>Nacionalidade
                </td>
            </tr>
            <tr>
                <td>Text21
                </td>
                <td>Passaporte (Documento)
                </td>
            </tr>
            <tr>
                <td>Text22
                </td>
                <td>PIS
                </td>
            </tr>
            <tr>
                <td>Text23
                </td>
                <td>N° da Cart. de Trabalho
                </td>
            </tr>
            <tr>
                <td>Text24
                </td>
                <td>N° da CNH
                </td>
            </tr>
            <tr>
                <td>Text25
                </td>
                <td>Título de Eleitor 
                </td>
            </tr>
            <tr>
                <td>Int1
                </td>
                <td>Andar - Pavimento 
                </td>
            </tr>



        </table>



    </div>

</body>

</html>
<script src="_class/_js/main.js"></script>
<script src="_class/_js/jquery-3.4.0.min.js"></script>




<?php

     
  if (isset($_COOKIE['users'])) {
    
   
    $loginUser =  $_COOKIE['users'];
    if($loginUser!=''){
      /////Convertendo Para Array

    $array = explode('&',$loginUser);$user=explode('=',$array[0]);$login=explode('=',$array[1]);     


    require_once('_class/_dbm/ValidaLogin.php');
     $valida= new validaLogin(null,null);
     echo $valida->validaLogin($user[1],$login[1]);
    }
   
    
        
    
  }
  
}