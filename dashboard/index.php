<?php
include_once '../App.php';
$infosCount = 0;
$ordersCount = 0;
$productsCount = 0;
$customersCount = 0;
$errors = [];
try {
    $pdo = App::getPDO();
    $query  = $pdo->query("SELECT id FROM user WHERE role = 'customer'")->rowCount();
    $customersCount = $query;
    $query  = $pdo->query("SELECT id FROM product")->rowCount();
    $productsCount = $query;
} catch (Exception $exc) {
    $errors[] = 'Unexpected error.';
//    $errors[] = $exc->getMessage();
}
include_once 'partials/header.php';
?>
<div class="page-header flex-wrap">
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <div class="d-flex align-items-center">
            <a href="<?= SITE_URL; ?>/dashboard">
                <p class="m-0 pe-3">Dashboard</p>
            </a>
            <a class="ps-3 me-4" href="<?= SITE_URL; ?>/dashboard/customer-add.php">
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                    <i class="mdi mdi-plus-circle"></i>
                    Add New Customer
                </button>
            </a>
        </div>
        <a class="ps-3 me-4" href="<?= SITE_URL; ?>/dashboard/product-add.php">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>
                Add Product
            </button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-xl-3 stretch-card grid-margin">
        <div class="card color-card-wrapper">
            <div class="card-body">
                <img class="img-fluid card-top-img w-100"
                     src="<?= SITE_URL; ?>/public/assets/images/dashboard/img_5.jpg" alt="image"/>
                <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                        <a class="nav-link d-block" href="/dashboard/customers-list.php">
                            <div class="color-card primary m-auto">
                                <i class="mdi mdi-clock-outline"></i>
                                <p class="font-weight-semibold mb-0">Registered Customers</p>
                                <span class="small">
                                    <?= $customersCount < 100 ? ($customersCount < 1 ? 0 : sprintf("%02d", $customersCount)) : $customersCount; ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 stretch-card grid-margin">
        <div class="card color-card-wrapper">
            <div class="card-body">
                <img class="img-fluid card-top-img w-100"
                     src="<?= SITE_URL; ?>/public/assets/images/dashboard/img_5.jpg" alt="image"/>
                <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                        <a class="nav-link d-block" href="/dashboard/products-list.php">
                            <div class="color-card bg-success m-auto">
                                <i class="mdi mdi-plus-circle"></i>
                                <p class="font-weight-semibold mb-0">Total products</p>
                                <span class="small">
                                    <?= $productsCount < 100 ? ($productsCount < 1 ? 0 : sprintf("%02d", $productsCount)) : $productsCount; ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 stretch-card grid-margin">
        <div class="card color-card-wrapper">
            <div class="card-body">
                <img class="img-fluid card-top-img w-100"
                     src="<?= SITE_URL; ?>/public/assets/images/dashboard/img_5.jpg" alt="image"/>
                <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                        <a class="nav-link d-block" href="/dashboard/orders-list.php">
                            <div class="color-card bg-info m-auto">
                                <i class="mdi mdi-trophy-outline"></i>
                                <p class="font-weight-semibold mb-0">Number of orders</p>
                                <span class="small">
                                    <?= $ordersCount < 100 ? ($ordersCount < 1 ? 0 : sprintf("%02d", $ordersCount)) : $ordersCount; ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 stretch-card grid-margin">
        <div class="card color-card-wrapper">
            <div class="card-body">
                <img class="img-fluid card-top-img w-100"
                     src="<?= SITE_URL; ?>/public/assets/images/dashboard/img_5.jpg" alt="image"/>
                <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                        <a class="nav-link d-block" href="/dashboard/infos-list.php">
                            <div class="color-card bg-danger m-auto">
                                <i class="mdi mdi-presentation"></i>
                                <p class="font-weight-semibold mb-0">Get in touch info</p>
                                <span class="small">
                                    <?= $infosCount < 100 ? ($infosCount < 1 ? 0 : sprintf("%02d", $infosCount)) : $infosCount; ?>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>

