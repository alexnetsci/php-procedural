<?php

require_once 'db_connection.php';

function index()
{
    global $connection;

    // ? Define query
    $query = "SELECT * FROM products";
    $res = mysqli_query($connection, $query);

    // * Check res
    if (!$res) die('Query failed <br>');

    while ($row = mysqli_fetch_assoc($res)) {
        $sku = $row['sku'];
        $name = $row['name'];
        $price = $row['price'];

        echo '<div class="card border-dark">';
        echo '<div class="card-body">';
        echo '<input type="checkbox" name="checkbox">';
        echo "<p class='card-text text-center'>{$sku} <br> {$name} <br> {$price} </p>";
        echo '</div>';
        echo '</div>';
    } 
}

// function get_in_select()
// {
//     global $connection;

//     // ? Define query
//     $query = "SELECT * FROM users";
//     $res = mysqli_query($connection, $query);

//     // * Check res
//     if (!$res) die('Query failed <br>');

//     while ($row = mysqli_fetch_assoc($res)) {
//         $id = $row['id'];
//         $name = $row['name'];
//         echo "<option value='$id'>$name</option>";
//     }
// }

function store()
{
    global $connection;

    // ? Define required input fields
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // * Check sku
    if (empty($sku)) {
        echo 'Field sku cannot be empty <br>';
        return;
    }

    // * Check name
    if (empty($name)) {
        echo 'Field name cannot be empty <br>';
        return;
    }

    // * Check price
    if (empty($price)) {
        echo 'Field price cannot be empty <br>';
        return;
    }

    // ? Define nullable input fields
    $selecter = $_POST['selecter'];

    // ? Define query
    switch ($selecter) {
        case 'dvd':
            $size = $_POST['size'];
            $query = "INSERT INTO products(sku,name,price,size) VALUES ('$sku','$name','$price','$size')";
            break;

        case 'book':
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];
            $query = "INSERT INTO products(sku,name,price,height,width,length) VALUES ('$sku','$name','$price','$height','$width','$length')";
            break;

        case 'furniture':
            $weight = $_POST['weight'];
            $query = "INSERT INTO products(sku,name,price,weight) VALUES ('$sku','$name','$price','$weight')";
            break;

        default:
            $query = "INSERT INTO products(sku,name,price) VALUES ('$sku','$name','$price')";
            break;
    }

    $res = mysqli_query($connection, $query);

    // * Check res
    if (!$res) die('Query failed <br>');
}

function edit()
{
    global $connection;

    if (isset($_POST['submit'])) {
        // ? Define input fields
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        // * Check id
        if (!empty($id)) {
            echo $id . '<br>';
        } else {
            echo 'Select an user to update <br>';
        }

        // * Check name
        if (!empty($name)) {
            echo $name . '<br>';
        } else {
            echo 'Field name cannot be empty <br>';
        }

        // * Check password
        if (!empty($password)) {
            echo $password . '<br>';
        } else {
            echo 'Field password cannot be empty <br>';
        }

        // ? Define query
        $query = "UPDATE users SET name='$name', password='$password' WHERE id=$id";
        $res = mysqli_query($connection, $query);

        // * Check res
        if (!$res) die('Query failed <br>');
    }
}

function destroy()
{
    global $connection;

    if (isset($_POST['submit'])) {
        // ? Define input fields
        $id = $_POST['id'];

        // * Check id
        if (!empty($id)) {
            echo $id . '<br>';
        } else {
            echo 'Select an user to delete <br>';
        }

        // ? Define query
        $query = "DELETE FROM users WHERE id=$id";
        $res = mysqli_query($connection, $query);

        // * Check res
        if (!$res) die('Query failed <br>');
    }
}
