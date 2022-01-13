<?php

require_once "../db.php";

if (isset($_POST['submit'])) {

    $data = $_POST["data"];

    $errorEmpty = false;

    if ($data != null && count($data) > 0) {
        for ($i = 0; $i < count($data); $i++) {
            $res = @mysqli_query($connection, "DELETE FROM products WHERE id='" . $data[$i]['value'] . "'");
            if (!$res) die('Query failed <br>');
            // @mysqli_close($connection);
            // header("Location:index.php");
        }
    } else {
        echo "<span class='text-warning'>Nothing to delete!</span>";
        $errorEmpty = true;
        return;
    }
} else {
    echo "There was an error!";
}

?>

<script>
    let errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == false) {
        window.location = 'index.php';
    }
</script>