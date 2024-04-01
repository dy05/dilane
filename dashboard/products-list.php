<?php
$menu = 'products';
include_once '../App.php';
App::redirectIfNotConnect();
$pdo = App::getPDO();
$user = $_SESSION['user'];
$isAdmin = strtolower($user->role) === 'admin';
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
                        <?php if ($isAdmin): ?>
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
                            Find
                        </button>
                    </div>
                </form>

                <?php if (!$isAdmin): ?>
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
                                <td>
                                    <div class="nav-profile-image" style="margin: 10px 0;">
                                        <img src="<?= SITE_URL; ?>/public/<?= isset($product->image) ? $product->image : 'img/product.jpg'; ?>" alt="profile"/>
                                    </div>
                                </td>
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
                <?php else: ?>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                    <div class="col-sm-6 col-xl-3 stretch-card grid-margin">
                        <div class="card color-card-wrapper">
                            <div class="card-body">
                                <img class="img-fluid card-top-img w-100"
                                     src="<?= SITE_URL; ?>/public/<?= isset($product->image) ? $product->image : 'img/product.jpg'; ?>" alt="image"/>
                                <div class="d-flex flex-wrap justify-content-around color-card-outer">
                                    <div class="col-6 mb-4 d-flex">
                                        <div class="d-flex flex-column color-card primary p-2 mx-auto" style="height: 12rem; width: 12rem;">
                                            <div>
                                                <span class="d-flex align-items-center">
                                                    <i class="mdi mdi-clock-outline"></i>
                                                    <?= $product->expiring_date; ?>
                                                </span>
                                            </div>
                                            <div>
                                                <p class="font-weight-semibold mb-0">
                                                    <?= substr($product->name, 0, 40); ?>
                                                    <?= mb_strlen($product->name) > 40 ? '...' : ''; ?>
                                                </p>
                                                <p class="font-weight-semibold mb-0">
                                                    (<?= $product->price; ?> FCFA)
                                                </p>
                                                <span class="small">
                                                    Remaining: <?= $product->quantity; ?>
                                                </span>
                                            </div>

                                            <button type="button" class="btn btn-primary" style="margin-top: auto;">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
