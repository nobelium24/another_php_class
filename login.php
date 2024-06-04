<?php
require ("./connect.php");
session_start();

$errors = [
    'email' => null,
    'password' => null
];

if (isset($_POST)) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Invalid email provided';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email provided';
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Invalid password provided';
    } else {
        if (!preg_match('/^[A-Za-z0-9+$]/', $_POST['password'])) {
            $errors['password'] = 'Invalid password provided';
        }
    }
}

if ($errors['email'] == null && $errors['password'] == null) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $validate = mysqli_query($connect, $query);
    $data = mysqli_fetch_assoc($validate);
    print_r($data);
    if (!isset($data)) {
        $errors['email'] = "Email does not exist";
    } else {
        $hashedPassword = $data['password'];
        if (!password_verify($password, $hashedPassword)) {
            $errors['password'] = "Invalid Password";
        } else {
            $_SESSION['user'] = $data;
            header("Location: ./dashboard.php");
        }
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
    <form action="login.php" method="POST" class="card mx-auto w-75 container p-5 border border-dark">
        <h6 class="display-6 text-center text-muted my-3">Sign in user</h6>

        <input class="form-control border border-dark w-100 mb-3" placeholder="Email" name="email" type="text">
        <p><?php $errors['email'] === null ? print_r("<br>") : print_r($errors['email']) ?></p>

        <input class="form-control border border-dark w-100 mb-3" placeholder="Password" name="password" type="text">
        <p><?php $errors['password'] === null ? print_r("<br>") : print_r($errors['password']) ?></p>

        <div>
            <button class="btn btn-dark">Submit</button>
        </div>   
    </form>
</body>
</html>