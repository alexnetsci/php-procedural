<?php

require_once "../db.php"; 

if (isset($_POST['submit'])) {

    $errorEmpty = false;

    print_r($_POST["data"]);
    $data = parse_str($_POST["data"], $item);

    if (count($item) > 0) {
        for ($i = 0; $i < count($item); $i++) {
            $res = mysqli_query($connection, "DELETE FROM products WHERE id='" . $item[$i] . "'");
            if (!$res) die('Query failed <br>');
            // mysqli_close($connection); 
            // header("Location:index.php");
        }
    } else {
        echo "<span class='text-warning'>Nothing to delete!</span>";
        $errorEmpty = true;
    }
} else {
    echo "There was an error!";
}

?>

<script>
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == false) {
        window.location = 'index.php';
    }
</script>