<?php

include '../../../helpers.php';

if (isset($_POST['submit'])) {
    store();
}

?>

<?php include_once '../layouts/header.php'; ?>
<div class="container py-4">
    <form action="create.php" method="post">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <h1>Products Add</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="submit" class="nav-link bg-transparent border-0" name="submit">Save</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Cancel</a>
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
                    <select id="type" name="selecter" onchange="showHiddenEle(this)" class="col-lg-4">
                        <option selected>Type Switcher</option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
                <div id="dvd" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="size" class="col-lg-5 m-0">Size (MB)</label>
                    <input type="text" class="col-lg-4" name="size">
                </div>
                <div id="book" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="height" class="col-lg-5 m-0">Height (CM)</label>
                    <input type="text" class="col-lg-4" name="height">

                    <label for="width" class="col-lg-5 m-0 mt-3">Width (CM)</label>
                    <input type="text" class="col-lg-4" name="width">

                    <label for="length" class="col-lg-5 m-0 mt-3">Length (CM)</label>
                    <input type="text" class="col-lg-4" name="length">
                </div>
                <div id="furniture" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="weight" class="col-lg-5 m-0">Weight (KG)</label>
                    <input type="text" class="col-lg-4" name="weight">
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function showHiddenEle(selectSrc) {
        if (selectSrc.value == 'dvd') {
            document.getElementById('dvd').style.display = "inline-block";
            document.getElementById('book').style.display = "none";
            document.getElementById('furniture').style.display = "none";
        } else if (selectSrc.value == 'book') {
            document.getElementById('dvd').style.display = "none";
            document.getElementById('furniture').style.display = "none";
            document.getElementById('book').style.display = "inline-block";
        } else if (selectSrc.value == 'furniture') {
            document.getElementById('book').style.display = "none";
            document.getElementById('dvd').style.display = "none";
            document.getElementById('furniture').style.display = "inline-block";
        } else {
            document.getElementById('dvd').style.display = "none";
            document.getElementById('book').style.display = "none";
            document.getElementById('furniture').style.display = "none";
        }
    }
</script>

<?php include_once '../layouts/footer.php'; ?>