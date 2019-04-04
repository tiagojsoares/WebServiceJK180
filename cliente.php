<?php


$options = array(
  'uri' => 'http://10.10.1.30/teste/servidor.php',
  'location' => 'http://10.10.1.30/teste/servidor.php'
);

$client = new SoapClient(null, $options);


echo $client->somar(10, 15); 