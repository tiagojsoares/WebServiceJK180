<?php
global $options;
$servidor = $_SERVER['SERVER_NAME'];

$options = array('uri' => "http://$servidor/_class/servidor.php",'location' => "http://$servidor/_class/servidor.php");

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

</head>

<body>

    <nav>
        <img src="_images/controller-bms.gif" id="image">
        <ul id="menu-desktop">
            <li><a href="" id="login">Login</a></li>
            <li><a href="" id="newuser">Criar Usuario</a></li>
            <li><a href="" id="tutorial">Tutorial</a></li>
            <li><a href="" id="param">Parâmetros</a></li>
            <li><a href="" id="logout">Logout</a></li>
        </ul>


    </nav>



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

        <main>


            <section id="tutorial">
                <section class="titulo">
                    <h2>Bem Vindo ao Tutorial WebService-JK180</h2>
                </section>
                <section id="texto">
                    <button class="accordion">Primeiro Passo</button>
                    <div class="panel">
                        <p> Primeiro passo é necessário ter um usuário cadastrado no
                            banco de dados. </p>
                    </div>
                    <button class="accordion">Criando um Novo Usu&aacute;rio WebService-JK180</button>
                    <div class="panel">
                        <p>Para criar um novo usuário para utilizar o WebService-JK180 é necessário realizar login em seguida clique em  'Criar Novo Usu&aacute;rio' 
                            
                          </p>
                    </div>
                    <button class="accordion">Gerando Novo Token</button>
                    <div class="panel">
                        <p>Para gerar um novo token https://dominio/?wsdl&action=gerarToken&login=user&senha=senha</p>
                    </div>
                    <button class="accordion">Inserindo Novo Usu&aacute;rio</button>
                    <div class="panel">
                        <p>Para Inserir um novo usuario:
                            "https://dominio/?wsdl&action=inserir&token=NovoToken&Parâmetros=Dados"</p>
                    </div>
                    <button class="accordion">Alterando  Usu&aacute;rio existente</button>
                    <div class="panel">
                        <p>Para Alterar dados relacionado ao usuario como nome, sobrenome, função, nivel de acesso (ClearanceKey), CPF etc.. <br>https://dominio/?wsdl&action=alterar&token=TokenValido&Text1=CampoObrigatorio&Parametros=dadosParametros</p>
                    </div>
                    <button class="accordion">Deletando Usu&aacute;rio Existente</button>
                    <div class="panel">
                        <p>Para deletar um usuario <br>
                            https://dominio/?wsdl&action=deletar&token=TokenValido&Text1=CampoObrigatorio</p>
                    </div>
                    <button class="accordion">Incluindo nivel de acesso a Usu&aacute;rio Existente</button>
                    <div class="panel">
                        <p>Para incluir um novo nivel de acesso a um Usu&aacute;rio já cadastrado <br>
                            https://dominio/?wsdl&action=incluiracesso&token=TokenValido&Text1=CampoObrigatorio&ClearanceKey=NivelDeAcesso</p>
                    </div>
                    <button class="accordion">Deletando nivel de acesso</button>
                    <div class="panel">
                        <p>Para retirar um nivel de acesso de um usuario cadastrado <br>
                            https://dominio/?wsdl&action=excluiracesso&token=TokenValido&Text1=CampoObrigatorio&ClearanceKey=NivelDeAcesso</p>
                    </div>
                    <button class="accordion">Adicionando um novo Cartão</button>
                    <div class="panel">
                        <p>Para Adicionar um cartão a um usuario<br>
                            https://dominio/?wsdl&action=cartaoinserir&token=TokenValido&Text1=CampoObrigatorio&CardNumber=numero
                            do
                            Cartao</p>
                    </div>
                    <button class="accordion">Removendo Cartão</button>
                    <div class="panel">
                        <p>Para remover um cartão a um usuario <br>
                            https://dominio/?wsdl&action=cartaodeletar&token=TokenValido&Text1=CampoObrigatorio&CardNumber=numero
                            do
                            Cartao</p>
                    </div>
                    <button class="accordion">Alterando Cartão</button>
                    <div class="panel">
                        <p>Para alterar um cartão a um usuario <br>
                            https://dominio/?wsdl&action=cartaoalterar&token=TokenValido&Text1=CampoObrigatorio&Novo=Cartao
                            Novo&Antigo=Cartao antigo</p>
                    </div>                    

                </section>             

            </section>


        </main>

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