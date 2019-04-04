<?php

// server.php
// public SoapServer ( mixed $wsdl [, array $options ] )

$options = array(
    'uri' => 'http://localhost:8080/soap.php'
);
$server = new SoapServer(null, $options);
	