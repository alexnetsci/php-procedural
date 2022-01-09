<?php

include '../../../helpers.php';

destroy();

?>

<?php include_once '../layouts/header.php'; ?>
<div class="container-fuild py-4">
    <div class="row mx-auto justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Delete</h6>
                    <form action="delete.php" method="post">
                        <div class="form-group">
                            <label for="select">Select user</label>
                            <select class="custom-select" name="id">
                                <?php get_in_select() ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../layouts/footer.php'; ?>