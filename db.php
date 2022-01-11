<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "demo";

//* Create connection
$connection = @mysqli_connect($servername, $username, $password, $database);

//* Check connection
if (!$connection) {
    die('DB Connection failed: ' . mysqli_connect_error() . '!<br>');
} else {
    echo 'DB Connected Successfully! <br>';
}
