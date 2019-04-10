<?php

class inserir{

function  inserir(){



    $arquivo_xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";
    $arquivo_xml .= "<CrossFire culture-info='pt-BR' platform-version='2.41.8' product-version='2.41.8'>";
    $arquivo_xml .="<SoftwareHouse.NextGen.Common.SecurityObjects.Personnel ImportMode='Delete'>";
    $arquivo_xml .= "<Text1></Text1>";
    
    $arquivo_xml .="</SoftwareHouse.NextGen.Common.SecurityObjects.Personnel>";
    $arquivo_xml .= "</CrossFire>"; 
   




header('Content-Type: application/xml; charset=utf-8');

print_r ($arquivo_xml);
    }
}