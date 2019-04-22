<?php
class NivelAcesso{
    function qNivel($id){
        $connection = new db();
        $conn = $connection->connect();
      
         $sql = "select * from log where id_usuario=$id order by time desc;";
         $query=mysqli_query($conn,$sql);
          $rs = mysqli_fetch_assoc($query);
          $Get=$rs['GET'];
          
           return ($Get);

    }
    function FormNivelInsert($dados,$function){
        $text =$dados['Text1'];
        $data = date('d-m-y_Hi');
        $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
$arquivo_xml.="<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Default'>";
        $arquivo_xml.="<Text1>$text</Text1>";



        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair ImportMode='$function'>";

            $nivel = $dados['ClearanceKey'];



            $arquivo_xml.="<ClearanceKey>".strtoupper($nivel)."</ClearanceKey>";



            $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";

    $arquivo_xml.="</CrossFire>" ;



$xml=$arquivo_xml;
file_put_contents("../_webservice/".$data."_RG_$text IncluirAcesso.xml",$xml);
return $arquivo_xml;



}
function AlterarPerso($dados,$function){
    unset($dados['action']);unset($dados['senha']);unset($dados['token']);unset($dados['login']);unset($dados['wsdl']);
    $keys = array_keys($dados);
    $text =$dados['Text1'];
    $data = date('d-m-y_Hi');
    $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
    $arquivo_xml.="<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='$function'>";
    $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
    for ($i=0; $i < count($keys); $i++) { 
        $dadoskey=$dados[$keys[$i]];$key = $keys[$i];
        if($keys[$i]!= 'ClearanceKey'){
            $arquivo_xml.="<$key>$dadoskey</$key>";
        }
       
    }
    if(isset($dados['ClearanceKey'])){
        if(strtoupper($dados['ClearanceKey'])=='VISITANTE'){
            $ClearanceDelete= 'PEPSICO';
        }
        else{
            $ClearanceDelete='VISITANTE';
        }
        $ClearanceKey=$dados['ClearanceKey'];
       $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair ImportMode='Delete'>";
       $arquivo_xml.="<ClearanceKey>$ClearanceDelete</ClearanceKey>";
       $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair>";
       $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair ImportMode='Default'>";
       $arquivo_xml.="<ClearanceKey>".strtoupper($ClearanceKey)."</ClearanceKey>";
       $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair>";
      
    }

    $arquivo_xml.="</CrossFire>" ; 
    $xml=$arquivo_xml;
    
file_put_contents("../_webservice/".$data."_RG_$text IncluirAcesso.xml",$xml);
return $arquivo_xml;  
}

function Cartao($dados,$function){
     $opt = $dados['action'];
    if($opt==="cartaoalterar"){
        $text =$dados['Text1'];$novo=$dados['Novo'];$antigo=$dados['Antigo'];      
        $keys = array_keys($dados);
        
        $data = date('d-m-y_Hi');
        $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
        $arquivo_xml.="<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Default'>";
        $arquivo_xml.="<Text1>$text</Text1>";
        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Credential ImportMode='Delete'>";
        $arquivo_xml.="<CardNumber>$antigo</CardNumber>";
        $arquivo_xml.="<AccessType>CardAccess</AccessType>";
        $arquivo_xml.="<CHUIDFormatKey>Card Only</CHUIDFormatKey>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Credential>";
        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Credential ImportMode='Default'>";
        $arquivo_xml.="<CardNumber>$novo</CardNumber>";
        $arquivo_xml.="<AccessType>CardAccess</AccessType>";
        $arquivo_xml.="<CHUIDFormatKey>Card Only</CHUIDFormatKey>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Credential>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
        $arquivo_xml.="</CrossFire>" ;
    
        $xml=$arquivo_xml;
        if(!isset($dados['Antigo']) || !isset($dados['Novo']) || !isset($dados['Text1'])){
        return '<Erro>Por Favor Digite o Text1, cartao Novo e Antigo</Erro>';
        }
        file_put_contents("../_webservice/".$data."_RG_$text Cartao.xml",$xml);
        return $arquivo_xml;
    }else{

        $text =$dados['Text1'];
        unset($dados['action']);unset($dados['Text1']);unset($dados['token']);unset($dados['login']);
        $keys = array_keys($dados);
        
        $data = date('d-m-y_Hi');
        $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
        $arquivo_xml.="<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Default'>";
        $arquivo_xml.="<Text1>$text</Text1>";
        $arquivo_xml.="<SoftwareHouse.NextGen.Common.SecurityObjects.Credential ImportMode='$function'>";
        for ($i=0; $i < count($keys); $i++) { 
            $dadoskey=$dados[$keys[$i]];$key = $keys[$i];
            $arquivo_xml.="<$key>$dadoskey</$key>";
        }
        $arquivo_xml.="<AccessType>CardAccess</AccessType>";
        $arquivo_xml.="<CHUIDFormatKey>Card Only</CHUIDFormatKey>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Credential>";
        $arquivo_xml.="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
        $arquivo_xml.="</CrossFire>" ;
    
        $xml=$arquivo_xml;
        if($text==""){
            return '<Erro>Por Favor Digite o Text1</Erro>';
            }
        file_put_contents("../_webservice/".$data."_RG_$text Cartao.xml",$xml);
        return $arquivo_xml;


    }
   
    
}


}