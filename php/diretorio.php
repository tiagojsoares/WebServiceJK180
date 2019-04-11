<?php
$data=array();
$images = scandir("images");
foreach ($images as $img) {
    if(!in_array($img,array(".",".."))){
$filename="images".DIRECTORY_SEPARATOR.$img;
$info = pathinfo($filename);
$info['size']=filesize($filename);
$info['modified']= date('d/m/y h:i:s',fileatime($filename));
$info['url']="http://localhost/php/".str_replace("\\","/",$filename);
array_push($data,$info);
    }
}
echo json_encode($data);