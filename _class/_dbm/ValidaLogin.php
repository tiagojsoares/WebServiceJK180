<?php
class validaLogin{
    function validaLogin($user,$login){
        
        $connection = new db();
        $conn = $connection->connect();
        $password= md5($login);
        $user;
        $sql = "select * from usuarios where nick_usuario ='$user' and senha_usuario='$password';";
        $query=mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($query);
        $rsSenha=$rs['senha_usuario'];

         
        $password.=($password).md5(date('H'));
        $rsSenha .= ($rsSenha).md5(date('H'));

        if($password === $rsSenha){        
        
        ?>
        <script src="/_class/_js/valida.js"></script>
        <?php   
       
        }
        else{
        return "<script>alert('Usuario ou Senha Invalidos');</script>";
        }
        
    }
}


?>
