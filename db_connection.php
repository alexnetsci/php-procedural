<?php 

// ? Define connection
$connection = mysqli_connect('localhost', 'root', '', 'demo');

// * Check connection
if ($connection) {
    echo 'DB Connected <br>';
} else {
    die('DB Connection failed <br>');
} 
