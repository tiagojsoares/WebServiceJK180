<?php
date_default_timezone_set('America/sao_paulo');
header('Content-Type: text/html; charset=utf-8');
class delete{
    function insertLog($text1,$token){    
       
        $connection = new db();
        $conn = $connection->connect();
        $queryID = "Select * from token where token ='$token'";
        $query=mysqli_query($conn,$queryID);        
        $id = mysqli_fetch_assoc($query);
        $idq = $id['usuario_token'];
       
         $text = json_encode($text1,JSON_UNESCAPED_UNICODE);
         
        $agora = date('Y-m-d H:i:s');
        try{
            $sqlInsert = "INSERT into log VALUES (NULL,$idq,'$text','$agora')"; 

            if($querInsert = mysqli_query($conn,$sqlInsert)){
                return 'sucesso';
            }      
            else{
                return 'fracasso';
            }      

        }
        catch(Exception $e){
            return 'erro '.$e;
        }

    }

    function qDelete($id){
        $connection = new db();
        $conn = $connection->connect();
      
         $sql = "select * from log where id_usuario=$id order by time desc;";
         $query=mysqli_query($conn,$sql);
          $rs = mysqli_fetch_assoc($query);
          $Get=$rs['GET'];
          
           return ($Get);

    }
    
}
    




?>