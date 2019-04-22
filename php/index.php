<?php
$login='tiago';
$senha='admin';
$action='action=gerarToken';
$link="http://localhost/?wsdl&$action&login=$login&senha=$senha";
$ch=curl_init($link);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
$reponse = curl_exec($ch);
curl_close($ch);
$data= json_encode($reponse,true);
print($data['token']);
?>