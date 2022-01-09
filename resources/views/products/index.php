<?php

include '../../../helpers.php';

?>

<?php include_once '../layouts/header.php'; ?>
<div class="container py-4">

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <h1>Products List</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Mass Delete</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="dropdown-divider"></div>

    <div class="row py-4">
        <div class="col-sm-12">
            <div class="card-deck">
                <?php index(); ?>
            </div>
        </div>
    </div>
</div>
<?php include_once '../layouts/footer.php'; ?>