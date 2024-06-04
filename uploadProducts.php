<?php
require("./connect.php");
session_start();

$firstQuery = "SELECT * FROM categories";
$result = mysqli_query($connect, $firstQuery);
print_r($result);
echo("<br>");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($data);
print_r($data[0]['category_name']);

if(isset($_POST['submit'])){
    $target_dir = 'images/';
    $target_file = $target_dir . basename($_FILES['product_image']['name']);
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_to_upload = $_FILES['product_image'];
    
    if(file_exists($target_file)){
        echo("This file already exists");
    }

    if(move_uploaded_file($file_to_upload['tmp_name'], $target_file)){
        echo("File uploaded seccessfully");
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
    <form action="uploadProducts.php" method="post" class="card mx-auto w-75 container p-5 border border-dark" 
    enctype="multipart/form-data">
        <h6 class="display-6 text-center text-muted my-3">Categories</h6>
        <input type="text" placeholder="Category name" name="product_name"  class="form-control border border-dark w-100 mb-3">
        <input type="file" name="product_image" class="form-control border border-dark w-100 mb-3">
        <input type="text" placeholder="Price" name="price"  class="form-control border border-dark w-100 mb-3">
        <input type="text" placeholder="Description" name="product_description"  class="form-control border border-dark w-100 mb-3">
        <select name="category_id" id="" class="form-control border border-dark w-100 mb-3">
            <option selected disabled>Categories</option>
            <?php for ($i = 0; $i < count($data); $i++) { ?>
                <option value=<?php echo($data[$i]['category_id']) ?>>
                    <?php echo($data[$i]['category_name']) ?>
                </option>
            <?php } ?>
            ?>
        </select>
        <input type="submit" name="submit" value="Submitted" class="btn btn-dark" />
    </form>
</body>
</html>

