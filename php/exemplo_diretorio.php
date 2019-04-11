<?php
$file=fopen("log.txt","a+");
fwrite($file,date('y-m-d h:i:s')."\r\n");
fclose($file);
echo "Arquivo criado";