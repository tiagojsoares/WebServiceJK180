<?php
class ValidaDados{
    function ValidaInsert($dados){
        if($dados['Text1']==""){
            return '<Erro>Por Favor Digite o Text1</Erro>';
          }
         
          if($dados['CardNumber']==""){
            return '<Erro>Digite o CardNumber</Erro>';
          }
          if($dados['LastName']==""){
            return '<Erro>Digite o LastName </Erro>';
          }
          if($dados['FirstName']==""){
            return '<Erro>Digite O FirstName</Erro>';
          }
          if($dados['PersonnelType']==""){
            return '<Erro>Digite o PersonnelType</Erro>';
          }
          if($dados['ClearanceKey']==""){
            return '<Erro>Digite O ClearanceKey</Erro>';
          }
         
          
}

}

?>