
<?php

function  inserirxml($dados,$keys,$mod,$Delete){
    $ClearanceKey='';
    header('Content-Type: text/html; charset=utf-8');
    $headerCleancer = "<SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair ImportMode='Default'>";$footerClenacer="</SoftwareHouse.NextGen.Common.SecurityObjects.PersonnelClearancePair>";
    $header= "<SoftwareHouse.NextGen.Common.SecurityObjects.Credential ImportMode='Default'>";$credential="";
    //Pegando RG Para Delete
    $text1 = utf8_encode($dados['Text1']); 
    $data = date('d-m-y_Hi');
    $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
    $arquivo_xml.="<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    ///Deletando usuario antes de inserir
    $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Delete'>";
    $arquivo_xml .="<Text1>$text1</Text1>";
    //Inserindo usuario Novo
    $arquivo_xml .= "</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
   // $arquivo_xml .= "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='$mod'>";
    for ($i=0; $i < count($keys); $i++) {    
        $values =utf8_encode($dados["$keys[$i]"]); 

        //Filtrando dados Do usuario           
       if($keys[$i] != "AccessType" && $keys[$i] !="CardNumber" && $keys[$i]!="ClearanceKey"){
        $arquivo_xml .= "<$keys[$i]>".strtoupper($values)."</$keys[$i]>". PHP_EOL;
       }  
       
       
       $footer="</SoftwareHouse.NextGen.Common.SecurityObjects.Credential>";
        ///Adicionando dados do cartão
        if($keys[$i]==="AccessType" || $keys[$i]==="CardNumber"){            
            
            $credential.= "<$keys[$i]>$values</$keys[$i]>";
           
        }
        ///Validando se Nivel de Acesso existe se não adiciona padrão Pepsico
    if($keys[$i]==="ClearanceKey"){
         $var = $keys[$i];
        $values =utf8_encode($dados['ClearanceKey']); 
        $ClearanceKey.="<$var>".strtoupper($values)."</$var>"; 
        }
       
        
    }
    if($ClearanceKey==""){
        $ClearanceKey="<ClearanceKey>PEPSICO</ClearanceKey>";
    }
     $credential.= "<AccessType>CardAccess</AccessType>";
     $credential.="<CHUIDFormatKey>Card Only</CHUIDFormatKey>";
     $header .= $credential;
     $header.=$footer;
     $Clearance=$headerCleancer.=$ClearanceKey;
     $Clearance.=$footerClenacer;

    $arquivo_xml.=$Clearance.=$header;
    //$arquivo_xml.=$header.=$Clearance;
    $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
    //$arquivo_xml .= "</CrossFire>";
    $arquivo_xml.="</CrossFire>" ;
    $xml=utf8_decode($arquivo_xml);
    file_put_contents("../_webservice/".$data."_RG_$Delete Inserindo.xml",$xml);
    
    return $arquivo_xml;

  
}
