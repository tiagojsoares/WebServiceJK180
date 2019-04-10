<?php



function FormDelete($text1){
    
    $arquivo_xml = "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Delete'>";
    $arquivo_xml .= "<Text1>$text1</Text1>";
    $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
    $arquivo_xml .= "</CrossFire>"; 
       return $arquivo_xml;
}







