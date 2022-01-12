<?php

require_once '../db.php';

// ? Define query
$query = "SELECT * FROM products";
$res = mysqli_query($connection, $query);

// * Check res
if (!$res) die('Query failed <br>');

?>

<?php include_once './includes/start_header.php'; ?>
<script>
    jQuery.noConflict();

    $(document).ready(function() {
        $("form").submit(function(event) {
            event.preventDefault();

            var submit = $("#button-submit").val();

            var data = []; 
            var product_list = $('input[name^="products\["]').serialize();
            if (product_list.length > 0) {
                data = product_list;
                console.log(data);
            } else {
                data = [];
            }

            $(".form-message").load("destroy.php", {
                submit: submit,
                data: data,
            });
        });
    });
</script>
<?php include_once './includes/end_header.php'; ?>

<div class="container py-4">
    <form action="destroy.php" method="POST">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <h1>Products List</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary" href="create.php">Add</a>
                    </li>
                    <li class="nav-item">
                        <button id="button-submit" type="submit" name="submit" class="btn btn-outline-secondary ml-2">Mass Delete</button>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="dropdown-divider"></div>

        <div class="row py-4">
            <div class="col-sm-12">
                <div class="card-deck">

                    <?php
                    $i = 0;
                    $n = 0;
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <div class="card border-dark" style="max-width: 18rem;">
                            <div class="card-body">
                                <input type="checkbox" name="products[]" value="<?php echo $row['id'] ?>">
                                <p class='card-text text-center'><?php echo $row['sku'] ?> <br> <?php echo $row['name'] ?> <br> <?php echo $row['price'] ?> </p>
                            </div>
                        </div>
                    <?php
                        $n++;
                        $i++;
                    }
                    ?>

                </div>
                <div class="form-group">
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>