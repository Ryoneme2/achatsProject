<?php

$postData = file_get_contents('php://input');
$jsondata = json_decode($postData);
// echo "postData =".json_encode($jsondata->name,JSON_UNESCAPED_UNICODE);
$data =  json_encode($jsondata->img);

echo $data;
