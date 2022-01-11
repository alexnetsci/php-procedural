<?php

require_once "../db.php";

$row_count = count($_POST["products"]);
for ($i = 0; $i < $row_count; $i++) {
    mysqli_query($connection, "DELETE FROM products WHERE id='" . $_POST['products'][$i] . "'");
}

header("Location:index.php");
