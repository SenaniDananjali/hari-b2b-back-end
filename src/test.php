<?php
include_once("../config/dbconfig.php");
header('Content-Type: application/json', true, 200);
header('Access-Control-Allow-Origin: *',true,200);
header('charset: utf-8',true,200);


$url= 'https://jsonplaceholder.typicode.com/posts';
$json = file_get_contents($url);
echo $json;
?>
