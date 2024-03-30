<?php
$menu = 'products';
$errors = [];
$datas = [];
include_once '../App.php';
App::redirectIfNotConnect();
try {
    if (!empty($_POST)) {
        $pdo = App::getPDO();
        $datas = $_POST;

        if (empty($datas['name'])) {
            $errors[] = 'Name is required';
        }

//        if (empty($datas['phone'])) {
//            $errors[] = 'Phone is required';
//        }

        if (empty($datas['quantity'])) {
            $errors[] = 'Quantity is required';
        }

        if (empty($datas['expiring_date'])) {
            $errors[] = 'Expiring date is required';
        }

        $quantity = $datas['quantity'];
        $name = $datas['name'];
        $price = $datas['price'];
        $expiring_date = $datas['expiring_date'];

        $query = $pdo->prepare("SELECT * FROM product WHERE name = :name");
        $query->bindParam(':name', $name);
        $query->execute();
        if ($query->fetch()) {
            $errors[] = 'Name is already taken.';
        }

        if (!empty($price)) {
            if (!((int)$price > 0)) {
                $errors[] = 'Price must be superior to 0.';
            }
        }

        if (!empty($quantity)) {
            if (!((int)$quantity > 0)) {
                $errors[] = 'Quantity must be superior to 0.';
            }
        }

        if (empty($errors)) {
            $query = $pdo->prepare("INSERT INTO product (name, quantity, price, expiring_date, user_id) VALUES(:name, :quantity, :price, :expiring_date, :user_id)");
            $query->bindParam(':name', $name);
            $query->bindParam(':quantity', $quantity);
            $query->bindParam(':price', $price);
            $query->bindParam(':expiring_date', $expiring_date);
            $userId = $_SESSION['user']->id;
            $query->bindParam(':user_id', $userId);
            if ($query->execute()) {
                $_SESSION['success'] = 'Product added successfully !';
                header('Location: products-list.php');
            }

            $errors[] = 'Unexpected error.';
        }
    }
} catch (Exception $exc) {
    $errors[] = 'Unexpected error.';
}

include_once 'partials/header.php';
?>
<div class="content-wrapper">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="display: flex; justify-content: space-between;">
                    <h2>
                        Products / Add new customer
                    </h2>
                    <div style="display: flex; background-color: #fff; align-items: flex-start; gap: 1rem;">
                        <a class="nav-link d-block p-0"  href="index.php">
                            <span class="btn btn-primary">
                                Back to Dashboard
                            </span>
                        </a>
                        <a class="nav-link d-block p-0" href="products-list.php">
                            <span class="btn btn-primary">
                                Product's list
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 grid-margin stretch-card" style="margin: auto;">
        <div class="card">
            <div class="card-body">
                <!--                        <p class="card-description">Register a new customer</p>-->
                <?php if(!empty($errors)): ?>
                    <div class="row" style="margin: 0; position: relative;" id="message-alert">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div style="width: 90%;">
                                <ul>
                                    <?php foreach($errors as $error): ?>
                                        <li><?= $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <button type="button" onclick="document.getElementById('message-alert')?.remove();"
                                    style="position: absolute; top: 10px; right: 10px; background-color: transparent; border: none;"
                                    class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <form class="forms-sample" action="" method="POST">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">
                            Product Name
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= isset($datas['name']) ? $datas['name'] : ''; ?>"
                                   placeholder="name" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">
                            Quantity
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   value="<?= isset($datas['quantity']) ? $datas['quantity'] : ''; ?>"
                                   placeholder="Quantity" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">
                            Price
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price" name="price"
                                   value="<?= isset($datas['price']) ? $datas['price'] : ''; ?>"
                                   placeholder="Price" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expiring_date" class="col-sm-3 col-form-label">
                            Expiring Date
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="expiring_date" id="expiring_date" min="<?= date('d/m/Y'); ?>"
                                   value="<?= isset($datas['expiring_date']) ? $datas['expiring_date'] : ''; ?>"
                                   placeholder="12/10/2028"/>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; flex-direction: row-reverse;">
                        <button type="submit" class="btn btn-primary me-2">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-light">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
