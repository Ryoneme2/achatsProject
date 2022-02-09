<?php

require_once '../config/dbcon.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$payload = json_encode($data->payload);
// var_dump($payload);
// save data to database


$sql = "INSERT INTO test_table (photo) VALUES ('$payload')";
var_dump($sql);
$result = mysqli_query($con, $sql);
