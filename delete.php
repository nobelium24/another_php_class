<?php
    require("./connect.php");
    $product_id = $_POST['product_id'];
    $query = "DELETE FROM products WHERE product_id = '$product_id'";
    $response = mysqli_query($connect, $query);
    if($response){
        echo("Product deleted successfully");
        header("Location: ./viewProducts.php");
    }
?>