<?php
session_start();
require ("./connect.php");
require('./cors.php');
cors();



$data = json_decode(file_get_contents("php://input"), true);
$_SESSION['userData'] = $data;
print_r($_SESSION['userData']);

echo(json_encode($data));

?>