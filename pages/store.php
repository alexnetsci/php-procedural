<?php

require_once "../db.php"; 

//? Define required input fields and expected errors 
$sku_error = $name_error = $price_error = "";
$sku = $name = $price = "";


function store()
{
    global $connection;
    global $sku_error, $name_error, $price_error;
    global $sku, $name, $price;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //* Check sku
        if (empty($_POST["sku"])) {
            $sku_error = 'SKU is required';
        } else {
            $sku = test_input($_POST["sku"]);
        }

        //* Check name
        if (empty($_POST["name"])) {
            $name_error = 'Name is required';
        } else {
            $name = test_input($_POST["name"]);
        }

        //* Check price
        if (empty($_POST["price"])) {
            $price_error = 'Price is required';
        } else {
            $price = test_input($_POST["price"]);
        }

        //? Define nullable input fields
        $options = $_POST['options'];

        //* Query
        switch ($options) {
            case 'dvd':
                $size = test_input($_POST['size']);
                $query = "INSERT INTO products(sku,name,price,size) VALUES ('$sku','$name','$price','$size')";
                break;

            case 'book':
                $weight = test_input($_POST['weight']);
                $query = "INSERT INTO products(sku,name,price,weight) VALUES ('$sku','$name','$price','$weight')";
                break;

            case 'furniture':
                $height = test_input($_POST['height']);
                $width = test_input($_POST['width']);
                $length = test_input($_POST['length']);
                $query = "INSERT INTO products(sku,name,price,height,width,length) VALUES ('$sku','$name','$price','$height','$width','$length')";
                break;

            default:
                $query = "INSERT INTO products(sku,name,price) VALUES ('$sku','$name','$price')";
                break;
        }

        $res = mysqli_query($connection, $query);

        // * Check res
        if (!$res) die('Query failed <br>');

        // mysqli_close($connection);

        header("Location:index.php");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
