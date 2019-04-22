<?php



function FormDelete($text1){
   
    if (isset($text1)){
      
        $data = date('d-m-y_Hi');
        $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
        $arquivo_xml .= "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
        $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Delete'>";
        $arquivo_xml .= "<Text1>$text1</Text1>";
        $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
        $arquivo_xml .= "</CrossFire>";
        $xml=$arquivo_xml;
        file_put_contents("../_webservice/".$data."_RG_$text1 Delete.xml",$xml);
        return $arquivo_xml;
    }
    else{
        $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
        $arquivo_xml .= "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
        $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Delete'>";
        $arquivo_xml .= "<Text1>Digite o Text1</Text1>";
        $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
        $arquivo_xml .= "</CrossFire>";
         
        return $arquivo_xml;
    }
   
}







