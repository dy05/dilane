<?php
$menu = 'products';
include_once 'partials/header.php';
?>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-description">Register a new product</p>
            <form class="forms-sample">
                <div class="form-group row">
                    <label for="productName" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="productName" placeholder="name"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productQuantity" class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="productQuantity" placeholder="Quantity"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productPrice" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="productPrice" placeholder="Price"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expiringDate" class="col-sm-3 col-form-label">
                        Expiring Date
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="expiringDate"
                               placeholder="ExpiringDate"/>
                    </div>
                </div>

                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"/>
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary me-2">
                    Submit
                </button>
                <button class="btn btn-light">
                    Cancel
                </button>
                <a class="nav-link d-block" href="<?= SITE_URL; ?>/dashboard">
                    <div class="template-demo">
                        <span type="button" class="btn btn-primary">
                            Back to Dashboard
                        </span>
                    </div>
                </a>
            </form>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
