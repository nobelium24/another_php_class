<?php
require('./connect.php');
session_start();
$user_session = $_SESSION['user'];
$isSeller = $user_session['is_seller'];
$userID = $user_session['user_id'];

print_r($_GET);

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $query = "UPDATE users SET is_seller = '1' WHERE user_id = '$userID'";
    $queryResponse = mysqli_query($connect, $query);
    // $data = mysqli_fetch_all($queryResponse, MYSQLI_ASSOC);
    // $data = mysqli_fetch_assoc($queryResponse);
    header("Location: ./dashboard.php");
}
?>