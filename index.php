<?php
// include("./connect.php");


echo ("Welcome to php class");
$name = "wole";
echo ('<br>');
echo ('Welcome ' . $name . ' to our php class');
echo ('<br>');
echo ("My name is $name");
$color = "Purple";
echo ('<br>');
echo ("The length of the color $color is " . strlen($color));
echo ('<br>');
echo ("The color $color in upper case is " . strtoupper($color));
echo ('<br>');
echo ("The color $color in lower case is " . strtolower($color));

$introduction = "Hii, my name is test. I'm happy to meet you.";
echo ('<br>');
$introductionTwo = str_replace('test', $name, $introduction);
echo ($introductionTwo);
echo ('<br>');

// numbers in php
echo (ceil(45.3));
echo ('<br>');
echo (floor(45.3));
echo ('<br>');

//Arrays in php
$names = ["Wole", "Omamerie", "Aanu", "Uthman"];
echo ($names[1]);
echo ('<br>');

$test = [
    "name" => "Test",
    "age" => 1111,
    "color" => "Green"
];
print_r($test);
print ("<br>");

$names2 = [
    0 => "Wole",
    1 => "Omamerie",
    2 => "Aanu"
];

array_push($names2, "Uthman");
print_r($names2);

$names2[] = "Test";
print_r($names2);



?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        for ($i = 0; $i < count($names); $i++) {
            echo ("<h1>My name is $names[$i] </h1>");
        }
        ?>
    </body>
    <script>

    </script>
    </html>

