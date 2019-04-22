<?php
class InserirP{

 

    function qInsertP($id){
        $connection = new db();
        $conn = $connection->connect();      
         $sql = "select * from log where id_usuario=$id order by time desc;";
         $query=mysqli_query($conn,$sql);
          $rs = mysqli_fetch_assoc($query);
          $Get=$rs['GET'];
          
           return ($Get);

    }

    function fechaToken($token){
        
        $connection = new db();
        $agora = date('Y-m-d H:i:s');
        $conn = $connection->connect();      
        $sql = "update token set utilizado = 2, data_utilizado ='$agora' where token = $token";
       
        if(mysqli_query($conn,$sql)){
        
        }
        else{
            return "ocorreu algum erro";
        }
        
         
          
    }
    function ValidaToken($token){
        $connection = new db();
        $conn = $connection->connect();      
         $sql = "select * from token where token = $token";
         $query=mysqli_query($conn,$sql);
          $rs = mysqli_fetch_assoc($query);
          $Get=$rs['utilizado'];          
         return ($Get);
    }
    
}
    


