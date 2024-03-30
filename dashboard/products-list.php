<?php
$menu = 'products';
include_once '../App.php';
App::redirectIfNotConnect();
$pdo = App::getPDO();
$user = $_SESSION['user'];
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT *, DATE_FORMAT(expiring_date, '%d-%m-%Y') as expiring_date FROM product";
if (!empty($search)) {
    $query .= " WHERE (name like '%" . $search . "%')";
}
//if ($user->role !== 'admin') {
//    $query .= " AND user_id = " . $user->id;
//}
$products = $pdo->query($query)->fetchAll();
include_once 'partials/header.php';
?>
<?php
$alert = null;
$success = true;
if (isset($_SESSION['success'])) {
    $alert = $_SESSION['success'];
    unset($_SESSION['success']);
} else if (isset($_SESSION['error'])) {
    $alert = $_SESSION['error'];
    unset($_SESSION['error']);
    $success = false;
}

if ($alert):
    ?>
    <div class="row" style="margin: 0 30px; position: relative;" id="message-alert">
        <div class="alert alert-<?= $success ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
            <div style="width: 90%;">
                <?= $alert; ?>
            </div>
            <button type="button" onclick="document.getElementById('message-alert')?.remove();"
                    style="position: absolute; top: 10px; right: 10px; background-color: transparent; border: none;"
                    class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>

<div class="content-wrapper">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="display: flex; justify-content: space-between;">
                    <h2>
                        Products in stock
                    </h2>
                    <div style="display: flex; background-color: #fff; align-items: flex-start; gap: 1rem;">
                        <a class="nav-link d-block p-0" href="index.php">
                            <span class="btn btn-primary">
                                Back to Dashboard
                            </span>
                        </a>
                        <?php if (strtolower($user->role) === 'admin'): ?>
                        <a class="nav-link d-block p-0" href="product-add.php">
                            <span class="btn btn-primary">
                                Add new product
                            </span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="d-flex align-items-center" action="#">
                    <div class="input-group">
                        <label for="search" class="input-group-prepend">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </label>
                        <input type="text" class="form-control border-0" id="search" value="<?= $search; ?>"
                               name="search" placeholder="Search"/>
                        <button type="submit"
                           class="btn btn-danger btn-icon-text">
                            FInd
                        </button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Quantity left</th>
                            <th>Price</th>
                            <th>Expiring Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr class="table-info">
                                <td><?= $product->id; ?></td>
                                <td><?= $product->name; ?></td>
                                <td><?= $product->quantity; ?></td>
                                <td><?= $product->price; ?></td>
                                <td><?= $product->expiring_date; ?></td>
                                <td>
                                    <div class="template-demo"
                                         style="display: flex !important; justify-items: start !important;">
                                        <a href="<?= SITE_URL; ?>/dashboard/product-edit.php?id=<?= $product->id; ?>"
                                           class="btn btn-danger btn-icon-text">
                                            <i class="mdi mdi-pencil btn-icon-append"></i>
                                            Update
                                        </a>
                                        <form onsubmit="return confirm('Do you confirm the suppression of the product ?');"
                                              method="POST" id="delete-product-<?= $product->id; ?>"
                                              action="<?= SITE_URL; ?>/dashboard/product-delete.php">
                                            <input type="hidden" name="id" value="<?= $product->id; ?>"/>
                                        </form>
                                        <a href="<?= SITE_URL; ?>/dashboard/product-delete.php"
                                           onclick="event.preventDefault(); if (confirm('Do you confirm the suppression of the product ?')) document.getElementById('delete-product-<?= $product->id; ?>')?.submit()"
                                           class="btn btn-labeled btn-danger">
                                            <i class="mdi mdi-trash-can btn-icon-trash"></i>
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
