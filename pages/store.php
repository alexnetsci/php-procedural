<?php

require_once "../db.php";

if (isset($_POST['submit'])) {

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    $size = $_POST['size'];

    $weight = $_POST['weight'];

    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    $errorEmpty = false;

    if (empty($sku) || empty($name) || empty($price)) {
        echo "<span class='text-danger'>Please fill in all fields!</span>";
        $errorEmpty = true;
    } else {
        $sku = test_input($_POST['sku']);
        $name = test_input($_POST['name']);
        $price = test_input($_POST['price']);

        switch ($type) { 
            case 'dvd':
                if (empty($size)) {
                    echo "<span class='text-danger'>Please fill in all fields!</span>";
                    $errorEmpty = true;
                    return;
                }
                $size = test_input($_POST['size']);
                $query = "INSERT INTO products(sku,name,price,type,size) VALUES ('$sku','$name','$price','$type','$size')";
                break;

            case 'book':
                if (empty($weight)) {
                    echo "<span class='text-danger'>Please fill in all fields!</span>";
                    $errorEmpty = true;
                    return;
                }
                $weight = test_input($_POST['weight']);
                $query = "INSERT INTO products(sku,name,price,type,weight) VALUES ('$sku','$name','$price','$type','$weight')";
                break;

            case 'furniture':
                if (empty($height) || empty($width) || empty($length)) {
                    echo "<span class='text-danger'>Please fill in all fields!</span>";
                    $errorEmpty = true;
                    return; 
                }
                $height = test_input($_POST['height']);
                $width = test_input($_POST['width']);
                $length = test_input($_POST['length']);
                $query = "INSERT INTO products(sku,name,price,type,height,width,length) VALUES ('$sku','$name','$price','$type','$height','$width','$length')";
                break;

            default:
                $query = "INSERT INTO products(sku,name,price) VALUES ('$sku','$name','$price')";
                break;
        }

        $res = @mysqli_query($connection, $query);
        if (!$res) die('Query failed <br>');
        // @mysqli_close($connection);
        // header("Location:index.php");
    }
} else {
    echo "There was an error!";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<script>
    let errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == false) {
        $("#input-sku", "#input-name", "#input-price").val("");
        window.location = 'index.php';
    }
</script>