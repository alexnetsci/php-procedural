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

            let submit = $("#button-submit").val();
            let sku = $("#input-sku").val();
            let name = $("#input-name").val();
            let price = $("#input-price").val();
            let type = $("#type").val();
            let size = $("#input-size").val();
            let weight = $("#input-weight").val();
            let height = $("#input-height").val();
            let width = $("#input-width").val();
            let length = $("#input-length").val();

            if (!sku) {
                return $("#input-sku").addClass("border border-danger");
            } else {
                $("#input-sku").removeClass("border border-danger");
                $("#input-sku").addClass("border border-success");
            }

            if (!name) {
                return $("#input-name").addClass("border border-danger");
            } else {
                $("#input-name").removeClass("border border-danger");
                $("#input-name").addClass("border border-success");
            }

            if (!price) {
                return $("#input-price").addClass("border border-danger");
            } else {
                $("#input-price").removeClass("border border-danger");
                $("#input-price").addClass("border border-success");
            }

            if (type) {
                switch (type) {
                    case 'dvd':
                        console.log('hit');
                        if (!size) {
                            return $("#input-size").addClass("border border-danger");
                        } else {
                            $("#input-size").removeClass("border border-danger");
                            $("#input-size").addClass("border border-success");
                        }
                        break;

                    case 'book':
                        if (!weight) {
                            return $("#input-weight").addClass("border border-danger");
                        } else {
                            $("#input-weight").removeClass("border border-danger");
                            $("#input-weight").addClass("border border-success");
                        }
                        break;

                    case 'furniture':
                        if (!height) {
                            return $("#input-height").addClass("border border-danger");
                        } else {
                            $("#input-height").removeClass("border border-danger");
                            $("#input-height").addClass("border border-success");
                        }
                        if (!width) {
                            return $("#input-width").addClass("border border-danger");
                        } else {
                            $("#input-width").removeClass("border border-danger");
                            $("#input-width").addClass("border border-success");
                        }
                        if (!length) {
                            return $("#input-length").addClass("border border-danger");
                        } else {
                            $("#input-length").removeClass("border border-danger");
                            $("#input-length").addClass("border border-success");
                        }
                        break;
                }
            }

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
                    <label for="sku">SKU</label>
                    <input id="input-sku" type="text" name="sku" class="col-lg-6 form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="input-name" type="text" name="name" class="col-lg-6 form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input id="input-price" type="text" name="price" class="col-lg-6 form-control">
                </div>

                <div class="form-group mt-5">
                    <label for="select">Type Switcher</label>
                    <select id="type" name="type" class="form-control col-lg-4">
                        <option selected>Type Switcher</option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>

                <div id="dvd" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="size">Size (MB)</label>
                    <input id="input-size" type="text" name="size" class="col-lg-4 form-control" aria-describedby="inputSizeDescription">
                    <small id="inputSizeDescription" class="form-text text-muted">Please, provide disc space in MB</small>
                </div>
                <div id="book" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="weight">Weight (KG)</label>
                    <input id="input-weight" type="text" name="weight" class="col-lg-4 form-control" aria-describedby="inputWeightDescription">
                    <small id="inputWeightDescription" class="form-text text-muted">Please, provide book weight in KG</small>
                </div>
                <div id="furniture" class="options" class="form-group border px-1 py-2 mt-3" style="display: none;">
                    <label for="height">Height (CM)</label>
                    <input id="input-height" type="text" name="height" class="col-lg-4 form-control" aria-describedby="inputHeightDescription">
                    <small id="inputHeightDescription" class="form-text text-muted">Please, provide height in CM</small>

                    <label for="width" class="mt-3">Width (CM)</label>
                    <input id="input-width" type="text" name="width" class="col-lg-4 form-control" aria-describedby="inputWidthDescription">
                    <small id="inputWidthDescription" class="form-text text-muted">Please, provide width in CM</small>

                    <label for="length" class="mt-3">Length (CM)</label>
                    <input id="input-length" type="text" name="length" class="col-lg-4 form-control" aria-describedby="inputLengthDescription">
                    <small id="inputLengthDescription" class="form-text text-muted">Please, provide length in CM</small>
                </div>
                <div class="form-group">
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>