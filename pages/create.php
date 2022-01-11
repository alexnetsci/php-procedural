<?php

require_once "../db.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//? Define required input fields and expected errors 
$sku_error = $name_error = $price_error = "";
$sku = $name = $price = "";

if (isset($_POST['submit'])) {

    //* Check sku
    if (!empty($_POST["sku"])) return $sku = test_input($_POST["sku"]);

    //* Check name
    if (!empty($_POST["name"])) return $name = test_input($_POST["name"]);

    //* Check price
    if (!empty($_POST["price"])) return $price = test_input($_POST["price"]);

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

    mysqli_close($connection);

    header("Location:index.php");
}

?>

<?php include_once './includes/header.php'; ?>

<div class="container py-4">
    <form id="myform" action="" method="post">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <h1>Products Add</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="submit" name="submit" class="btn btn-outline-secondary">Save</button>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary ml-2" href="index.php">Cancel</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="dropdown-divider"></div>

        <div class="row py-4">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="sku" class="col-lg-2">SKU</label>
                    <input type="text" class="col-lg-6" name="sku">
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2">Name</label>
                    <input type="text" class="col-lg-6" name="name">
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-2">Price ($)</label>
                    <input type="text" class="col-lg-6" name="price">
                </div>
                <div class="form-group mt-5">
                    <label for="select" class="col-lg-4">Type Switcher</label>
                    <select id="type" name="options" class="col-lg-4">
                        <option selected>Type Switcher</option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
                <div id="dvd" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="size" class="col-lg-5 m-0">Size (MB)</label>
                    <input type="text" class="col-lg-4" name="size">
                </div>
                <div id="book" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="weight" class="col-lg-5 m-0">Weight (KG)</label>
                    <input type="text" class="col-lg-4" name="weight">
                </div>
                <div id="furniture" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="height" class="col-lg-5 m-0">Height (CM)</label>
                    <input type="text" class="col-lg-4" name="height">

                    <label for="width" class="col-lg-5 m-0 mt-3">Width (CM)</label>
                    <input type="text" class="col-lg-4" name="width">

                    <label for="length" class="col-lg-5 m-0 mt-3">Length (CM)</label>
                    <input type="text" class="col-lg-4" name="length">
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(function() {
        $('#type').change(function() {
            $('.options').hide();
            $('#' + $(this).val()).show();
        });
    });

    $("#myform").validate({
        rules: {
            sku: "required",
            name: "required",
            price: "required",
            sku: {
                required: true
            },
            name: {
                required: true,
            },
            price: {
                required: true,
            },
        },

        messages: {
            sku: "Sku is required",
            name: "Name is required",
            price: "Price is required"
        },

        submitHandler: function(form) {
            form.submit();
        }
    });
</script>

<?php include_once './includes/footer.php'; ?>