<?php
require ("./connect.php");
$query = "SELECT * FROM products";
$response = mysqli_query($connect, $query);
$data = mysqli_fetch_all($response, MYSQLI_ASSOC);
print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section >
        <h6 class="text-center text-muted display-6">Products</h6>
        <section class="d-flex">
            <?php for ($i = 0; $i < count($data); $i++) { ?>
                <div class="card w-25 shadow-lg mx-2 p-3">
                    <img src=<?php echo($data[$i]['product_image']) ?> alt="">
                    <p>Product name: <?php echo ($data[$i]['product_name']) ?></p>
                    <p>Product description: <?php echo ($data[$i]['product_description']) ?></p>
                    <p>Product price: <?php echo ($data[$i]['price']) ?></p>

                    <form action="delete.php" method="post">
                        <input type="hidden" name="product_id" value=<?php echo($data[$i]['product_id']) ?>>
                        <button class="btn btn-dark">Delete</button>
                    </form>
                </div>
        <?php } ?>
        </section>
    </section>
</body>
</html>