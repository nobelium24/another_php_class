<?php
require ("./connect.php");


$errors = [
    "first_name" => null,
    "last_name" => null,
    "email" => null,
    "password" => null
];

print_r($_POST);
if (isset($_POST)) {


    if (empty($_POST['email'])) {
        $errors['email'] = 'Invalid email inserted';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email inserted';
        }
    }

    if (empty($_POST['first_name'])) {
        $errors['first_name'] = "Invalid first name inserted";
    } else {
        if (!preg_match('/^[A-Za-z+$]/', $_POST['first_name'])) {
            $errors['first_name'] = "Invalid first name inserted";
        }
    }

    if (empty($_POST['last_name'])) {
        $errors['last_name'] = "Invalid last name inserted";
    } else {
        if (!preg_match('/^[A-Za-z+$]/', $_POST['last_name'])) {
            $errors['last_name'] = "Invalid last name inserted";
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Invalid password inserted";
    } else {
        if (!preg_match('/^[A-Za-z0-9+$]/', $_POST['password'])) {
            $errors['password'] = "Invalid password inserted";
        }
    }

    if ($errors['first_name'] == null && $errors['last_name'] == null && $errors['email'] == null && $errors['password'] == null) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST['password'];


        $new_password = password_hash($password, PASSWORD_DEFAULT);
        


        // $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$new_password')";
        // $insert = mysqli_query($connect, $query);
        // if ($insert) {
        //     echo ("New user created");
        //     header("Location: ./login.php");
        // } else {
        //     print_r(mysqli_error($connect));
        // }

        $query = $connect->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $first_name, $last_name, $email, $new_password);
        $response = $query->execute();
        if(!$response){
            echo("An error occurred");
        }else{
            echo("Account created");
            header("Location: ./login.php");
        }
        
    } else {
        echo ("Wahala");
    }

}


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
    <form action="registerUser.php" method="POST" class="card mx-auto w-75 container p-5 border border-dark">
        <h6 class="display-6 text-center text-muted my-3">Register User</h6>
        <input class="form-control border border-dark w-100 mb-3" placeholder="First name" name="first_name" type="text">
        <p><?php $errors['first_name'] === null ? print_r("<br>") : print_r($errors['first_name']) ?></p>

        <input class="form-control border border-dark w-100 mb-3" placeholder="Last name" name="last_name" type="text">
        <p><?php $errors['last_name'] === null ? print_r("<br>") : print_r($errors['last_name']) ?></p>

        <input class="form-control border border-dark w-100 mb-3" placeholder="Email" name="email" type="text">
        <p><?php $errors['email'] === null ? print_r("<br>") : print_r($errors['email']) ?></p>

        <input class="form-control border border-dark w-100 mb-3" placeholder="Password" name="password" type="text">
        <p><?php $errors['password'] === null ? print_r("<br>") : print_r($errors['password']) ?></p>

        <div>
            <button class="btn btn-dark">Submit</button>

            <a href="./login.php" type="button" class="btn btn-dark">Login</a>
        </div>   
    </form>
</body>
</html>