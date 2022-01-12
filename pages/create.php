<?php include_once './includes/start_header.php'; ?>
<script>
    jQuery.noConflict();

    $(document).ready(function() {
        $('#type').change(function() {
            $('.options').hide();
            $('#' + $(this).val()).show();
        });

        $("form").submit(function(event) {
            event.preventDefault();

            var submit = $("#button-submit").val();
            var sku = $("#input-sku").val();
            var name = $("#input-name").val();
            var price = $("#input-price").val();
            var type = $("#type").val();
            var size = $("#input-size").val();
            var weight = $("#input-weight").val();
            var height = $("#input-height").val();
            var width = $("#input-width").val();
            var length = $("#input-length").val();

            $(".form-message").load("store.php", {
                submit: submit,
                sku: sku,
                name: name,
                price: price,
                type: type,
                size: size,
                weight: weight,
                height: height,
                width: width,
                length: length,
            });
        });
    });
</script>
<?php include_once './includes/end_header.php'; ?>

<div class="container py-4">
    <form action="store.php" method="POST">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <h1>Products Add</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button id="button-submit" type="submit" name="submit" class="btn btn-outline-secondary">Save</button>
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
                    <input id="input-sku" type="text" name="sku" class="col-lg-6">
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2">Name</label>
                    <input id="input-name" type="text" name="name" class="col-lg-6">
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-2">Price ($)</label>
                    <input id="input-price" type="text" name="price" class="col-lg-6">
                </div>

                <div class="form-group mt-5">
                    <label for="select" class="col-lg-4">Type Switcher</label>
                    <select id="type" name="type" class="col-lg-4">
                        <option selected>Type Switcher</option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>

                <div id="dvd" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="size" class="col-lg-5">Size (MB)</label>
                    <input id="input-size" type="text" name="size" class="col-lg-4">
                </div>
                <div id="book" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="weight" class="col-lg-5">Weight (KG)</label>
                    <input id="input-weight" type="text" name="weight" class="col-lg-4">
                </div>
                <div id="furniture" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="height" class="col-lg-5">Height (CM)</label>
                    <input id="input-height" type="text" name="height" class="col-lg-4">

                    <label for="width" class="col-lg-5 mt-3">Width (CM)</label>
                    <input id="input-width" type="text" name="width" class="col-lg-4">

                    <label for="length" class="col-lg-5 mt-3">Length (CM)</label>
                    <input id="input-length" type="text" name="length" class="col-lg-4">
                </div>
                <div class="form-group">
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>