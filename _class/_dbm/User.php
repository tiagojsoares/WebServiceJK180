<?php
date_default_timezone_set('America/sao_paulo');


$function = $_GET['function'];


if ($function=="login"){
$login= login();
}

if ($function=="inserir"){
    
    $login= Inserir();
}




function login(){
require_once('../db.php');
$connection = new db();
$conn = $connection->connect(); 
$password= md5($_POST['password']);
$user=$_POST['login'];

$sql = "select * from usuarios where nick_usuario='$user' and senha_usuario='$password';";
$query=mysqli_query($conn,$sql);
$rs = mysqli_fetch_assoc($query);
$rsLogin=$rs['nick_usuario'];$rsSenha=$rs['senha_usuario'];

if ($rsLogin ===$user && $rsSenha===$password){
    

echo $rsSenha.md5(date('H'));

}


}

function Inserir(){

    require_once('../db.php');
    $connection = new db();
    $conn = $connection->connect(); 
    $password= md5($_POST['password']);
    $user=$_POST['login'];
    $nome = $_POST['nome'];    
    
    $sql = "insert into usuarios (id_usuario,nome_usuario,nick_usuario,senha_usuario) values (null,'$nome','$user','$password',1);";
    
   
    if(mysqli_query($conn,$sql)){

        //////Parei aqui e FUncinou
echo "FUncionou";
    }
    
    
    
    
    
    }
    
