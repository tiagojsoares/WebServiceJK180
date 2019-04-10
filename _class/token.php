<?php
date_default_timezone_set('America/sao_paulo');

class token{  
function Token($login,$Senha,$tokenG){ 
 
$connection = new db();
$conn = $connection->connect();
if(isset ($login) || isset($senha)){  
  
   $senha = md5($Senha);
  
  $sql = "select * from usuarios where  nick_usuario = '$login' and senha_usuario = '$senha';";
  $query = mysqli_query($conn,$sql);
  $dados = mysqli_fetch_assoc($query);
  
  //validando login e senha
  if($dados===null){
  return '<ERRO> Ocorreu um erro usuario ou senha Invalidos</ERRO>';
  }
  else{
      //criando token
      //$token =  md5(date('s').date('y'));
      $token = rand(100000000000000,9999999999999999);
      //return "<ERRO> $token </ERRO>";  
      $id_usuario =$dados['id_usuario'];
       
        $agora= date('Y-m-d H:i:s');
       
        
        //enviando   valor do timestamp
           
   
      
      $querInsert= 'insert into token (data_token,token,usuario_token,utilizado) values ("'.$agora.'","'.$token.'",'.$id_usuario.',0);';
     
    try{
      if(mysqli_query($conn,$querInsert)){
         $token;
         
         $arquivo_xml = "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
         $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Token'>";         
         $arquivo_xml .= "<Token>$token</Token>";    
         $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
         $arquivo_xml .= "</CrossFire>";    



    return ($arquivo_xml);
         
         
      }      
        
    }
    catch(Exception $e){
      return '<ERRO> Ocorreu um erro usuario senha Invalidos </ERRO>';  
    }
  }
  
  
  
  
  }
  else{
    return '<ERRO> Ocorreu um erro usuario ou senha Invalidos</ERRO>';
  }
  }
}


?>