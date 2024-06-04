<?php
require("./connect.php");
session_start();
$user_session = $_SESSION['user'];
$email = $user_session["email"];

$getSellerQuery = "SELECT * FROM users WHERE email = '$email'";
$queryDB = mysqli_query($connect, $getSellerQuery);
$data = mysqli_fetch_assoc($queryDB);
$isSeller = $data['is_seller']

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
        <h6 class="display-6 text-center text-muted w-100">
          Welcome <?php echo $user_session['first_name'] . " " . $user_session['last_name'] ?>
        </h6>
      </ul>
      <form class="d-flex" role="search" action="isSeller.php" method="GET" >
        <?php 
          $isSeller == 1 ? print_r('<button class="btn btn-outline-success" disabled type="submit">Become Seller</button>') : print_r('<button class="btn btn-outline-success" type="submit">Become Seller</button>')
        ?>
      </form>
    </div>
  </div>
</nav>
</body>
</html>