<?php
$menu = 'products';
$errors = [];
$datas = [];
include_once '../App.php';
App::redirectIfNotConnect();
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    include_once 'partials/notfound.php';
    die();
}
$pdo = App::getPDO();
$query = $pdo->prepare("SELECT * FROM product WHERE id = :id");
$query->bindParam(':id', $id);
$query->execute();
$product = $query->fetch(PDO::FETCH_ASSOC);
if (empty($product)) {
    $_SESSION['error'] = 'Product not found';
    header('Location: products-list.php');
}

try {
    if (!empty($_POST)) {
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

        $query = $pdo->prepare("SELECT * FROM product WHERE name = :name AND id != :id");
        $query->bindParam(':name', $name);
        $query->bindParam(':id', $id);
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

        $image = $product['image'];

        if (!isset($datas['deleteImage'])) {
            $image = null;
        }

        if (empty($errors)) {
            $file = $_FILES['image'];
            if ($file && !empty($file['tmp_name'])) {
                $targetFile = 'uploads' . DIRECTORY_SEPARATOR . time() . basename($file['name']);

                // Check if image file is an actual image or fake image
                $check = getimagesize($file['tmp_name']);

                // Check if file already exists
                if (file_exists($targetFile)) {
                    $errors[] = "Sorry, file already exists.";
                }

                // Check file size
                if (!isset($check['mime']) || $file['size'] > 500000) {
                    $errors[] = "Sorry, your file is too large or size incorrect.";
                }

                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                // Allow certain file formats
                if (!in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
                    $errors[] = "Sorry, only JPG, JPEG, PNG files are allowed.";
                }

                if (empty($errors)) {
                    if (move_uploaded_file($file['tmp_name'], dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $targetFile)) {
                        $image = $targetFile;
                    }
                }
            }
        }

        if (empty($errors)) {
            $query = $pdo->prepare("UPDATE product SET name=:name,  image=:image, quantity=:quantity, price=:price, expiring_date=:expiring_date, user_id=:user_id WHERE id = :id");
            $query->bindParam(':name', $name);
            $query->bindParam(':quantity', $quantity);
            $query->bindParam(':price', $price);
            $query->bindParam(':image', $image);
            $query->bindParam(':expiring_date', $expiring_date);
            $userId = $product['user_id'];
            if (isset($datas['user_id'])) {
                $userId = $datas['user_id'];
            }
            $query->bindParam(':user_id', $userId);
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                $_SESSION['success'] = 'Product updated successfully !';
                header('Location: products-list.php');
            }

            $errors[] = 'Unexpected error.';
        }
    }
} catch (Exception $exc) {
    $errors[] = 'Unexpected error.';
}
$datas = $product;
include_once 'partials/header.php';
?>
<div class="content-wrapper">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="display: flex; justify-content: space-between;">
                    <h2>
                        Products / Modify product
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
                <!--                        <p class="card-description">Register a new product</p>-->
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

                <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group row">
                        <label for="expiring_date" class="col-sm-3 col-form-label">
                            Image
                        </label>
                        <div class="col-sm-9">
                            <div style="position: relative; width: 200px; height: 200px; border: 1px solid #ccc; margin-bottom: 1rem; border-radius: 0.5rem;">
                                <div id="imageContainer" style="height: 100%;">
                                    <label for="image" style="width: 100%; height: 100%;">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 text-gray-400 opacity-50" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                                <button type="button" id="imageBtnDelete"
                                        style="display: none; color: #ccc; position: absolute; z-index: 10; border: none; background-color: transparent; font-weight: bold; top: 0.125rem; right: 0.125rem;">
                                    X
                                </button>
                            </div>
                            <input type="file" name="image" style="display: none;" id="image" onchange="readURL(this);"/>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; flex-direction: row-reverse;">
                        <label for="deletedImage" style="display: none;"></label>
                        <input type="checkbox" <?= isset($datas['image']) ? 'checked' : ''; ?> value="<?= isset($datas['image']) ? $datas['image'] : ''; ?>"
                               name="deleteImage" id="deletedImage" style="display: none;"/>
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

<script>
    const MAX_SIZE = 1024 * 1024 * 2;
    let allowedExtension = ['image/jpeg', 'image/jpg', 'image/png','image/gif','image/bmp'];
    let _imageBtnDelete = null;
    let _imageContainer = null;
    let _imageInput = null;
    let _imageLink = `<?= isset($datas['image']) ? $datas['image'] : ''; ?>`;

    window.addEventListener('load', () => {
        _imageBtnDelete = document.getElementById('imageBtnDelete');
        _imageContainer = document.getElementById('imageContainer');
        _imageInput = document.getElementById('image');
        if (_imageLink.length) {
            changeImageLink(`<?= SITE_URL . '/public/'; ?>${_imageLink}`);
        }

        if (_imageBtnDelete) {
            let _labelSpan = _imageContainer.querySelector('span');
            _imageBtnDelete.addEventListener('click', () => {
                _imageContainer.style.background = 'none';
                if (_labelSpan) {
                    _labelSpan.style.display = 'block';
                }

                if (_imageInput) {
                    _imageInput.value = null;
                    delete _imageInput.files;
                }

                let _deletedImage = document.getElementById('deletedImage');
                if (_deletedImage) {
                    _deletedImage.checked = false;
                }
            });
        }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            let file = input.files[0];
            if (file.size > MAX_SIZE) {
                alert("L'image ajoutée dépasse la taille maximum (2 Mo).");
                input.value = null;
            } else if (allowedExtension.indexOf(file.type) < 0) {
                alert("Le type de l'image ajoutée n'est pas autorisée.");
                input.value = null;
            } else {
                let reader = new FileReader();
                reader.onload = function (e) {
                    changeImageLink(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    function changeImageLink(link) {
        if (_imageContainer) {
            let _labelSpan = _imageContainer.querySelector('span');
            if (_labelSpan) {
                _labelSpan.style.display = 'none';
            }
            _imageContainer.style.backgroundImage = "url('" + link + "')";
            _imageContainer.style.backgroundSize = 'contain';
            _imageContainer.style.backgroundRepeat = 'no-repeat';
            _imageContainer.style.backgroundPosition = 'center';
            if (_imageBtnDelete) {
                _imageBtnDelete.style.display = 'block';
            }
        }
    }
</script>
<?php
include_once 'partials/footer.php';
?>
