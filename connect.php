<?php
$connect = mysqli_connect("localhost", "nobelium24", "password", "class_one_db");

if (!$connect) {
    print_r("Connection error: " . mysqli_connect_error());
}else{
    echo("Connection successful");
}


?>