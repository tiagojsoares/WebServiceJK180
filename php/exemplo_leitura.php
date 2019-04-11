<?php
$filename = "usuarios.csv";
if(file_exists($filename)){
$file = fopen($filename,"r");
$header = explode (",",fgets($file));
while($row = fgets($file)){
$rowData= explode (",", $row);
$linha
for ($i=0; $i < count($header); $i++) { 
   
}

}
fclose($file);
}
