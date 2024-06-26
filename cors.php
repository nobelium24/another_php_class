<?php
function cors(){
    if(isset($_SERVER['HTTP_ORIGIN'])){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Max-Age: 86400');
    }
    if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
        if(isset(($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))){
            header('Access-Control-Allow-Method:GET, POST, PUT, PATCH, DELETE, OPTIONS');
        }
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
            header('Access-Control-Allow-Headers:{$_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]}');
            exit(0);
        }
    }
}

?>