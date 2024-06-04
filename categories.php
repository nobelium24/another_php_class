<?php 
    session_start();
    require("./connect.php");

    if(isset($_POST)){
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];

        $query = "INSERT INTO categories (category_name, description) VALUES ('$category_name', '$description')";
        $insert = mysqli_query($connect, $query);
        if(!$insert){
            print_r(mysqli_error($insert));
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
    <form action="categories.php" method="post" class="card mx-auto w-75 container p-5 border border-dark">
        <h6 class="display-6 text-center text-muted my-3">Categories</h6>
        <input type="text" placeholder="Category name" name="category_name"  class="form-control border border-dark w-100 mb-3">
        <input type="text" placeholder="Description" name="description"  class="form-control border border-dark w-100 mb-3">
        <button class="btn btn-dark">Submit</button>
    </form>
</body>
</html>
