<?php require_once('_class/db.php');

class nome{
function nome(){
    $connection = new db();
   $conn= $connection->connect();
   
   if(isset($_COOKIE['users'])){
        $teste = $_COOKIE['users'];
       if(!$teste==''){
        $loginUser =  $_COOKIE['users'];
        $array = explode('&',$loginUser);$user=explode('=',$array[0]);$login=explode('=',$array[1]); 
        //////////////////Bucando nome////////////////////////
        
            $usuario = $user[1];
            $senha = md5($login[1]);
            $sql = "select Nome_usuario from usuarios where nick_usuario ='$usuario' and senha_usuario='$senha' ";
            $query=mysqli_query($conn,$sql);
            $rs = mysqli_fetch_assoc($query);
            
          
            return ucfirst($rs['Nome_usuario']);  
       }
   
    }
   return '';
    

}
}?>
