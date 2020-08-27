<?php
header("Access-Control-Allow-Origin: *");
//Redis stuff
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$userIP = $_SERVER['REMOTE_ADDR'];



$redis->set($userIP, "1");
$redis->EXPIRE($userIP, 10);

//Proxy stuff
$file = "http://127.0.0.1:8080/" . $_GET['file'];

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 500);
curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($curl, $data) {
    echo $data;
    return strlen($data);
});
curl_exec($ch);
curl_close($ch);
?>
