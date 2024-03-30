<?php
$menu = 'customers';
$errors = [];
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
$query = $pdo->prepare("SELECT *, username as email FROM user WHERE id = :id");
$query->bindParam(':id', $id);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
if (empty($user)) {
    $_SESSION['error'] = 'User not found';
    header('Location: customers-list.php');
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

        if (empty($datas['email'])) {
            $errors[] = 'Email is required';
        }

        if (empty($datas['gender'])) {
            $errors[] = 'Gender is required';
        }

        if (empty($datas['profession'])) {
            $errors[] = 'Profession is required';
        }

        $email = $datas['email'];
        $phone = $datas['phone'];
        $password = $datas['password'];

        $query = $pdo->prepare("SELECT * FROM user WHERE username = :username AND id != :id");
        $query->bindParam(':username', $email);
        $query->bindParam(':id', $id);
        $query->execute();
        if ($query->fetch()) {
            $errors[] = 'Email is already taken.';
        }

        if (!empty($phone)) {
            $query = $pdo->prepare("SELECT * FROM user WHERE phone = :phone AND id != :id");
            $query->bindParam(':phone', $phone);
            $query->bindParam(':id', $id);
            $query->execute();
            if ($query->fetch()) {
                $errors[] = 'Phone is already taken.';
            }
        }

        if (!empty($password)) {
            if (strlen($password) < 5) {
                $errors[] = 'Password must be at least 5 characters.';
            }
        }

        if (empty($errors)) {
            $name = $datas['name'];
            $profession = $datas['profession'];
            $gender = $datas['gender'];
            $queryString = "UPDATE user SET role=:role, username=:username, phone=:phone, name=:name, profession=:profession, gender=:gender";
            if (!empty($password)) {
                $queryString .= ", password=:password";
                $password = password_hash($password, PASSWORD_BCRYPT);
            }
            $queryString .= " WHERE id = :id";
            // verify email
            $query = $pdo->prepare($queryString);
            if (!empty($password)) {
                $query->bindParam(':password', $password);
            }
            $query->bindParam(':username', $email);
            $query->bindParam(':phone', $phone);
            $query->bindParam(':gender', $gender);
            $query->bindParam(':profession', $profession);
            $query->bindParam(':name', $name);
            $role = $user['role'];
            if (isset($datas['role'])) {
                $role = $datas['role'];
            }
            $query->bindParam(':role', $role);
            $query->bindValue(':id', $id);
            if ($query->execute()) {
                $_SESSION['success'] = 'Customer updated successfully !';
                header('Location: customers-list.php');
            }

            $errors[] = 'Unexpected error.';
        }
    }
} catch (Exception $exc) {
    $errors[] = 'Unexpected error.';
}

$datas = $user;
include_once 'partials/header.php';
?>
<div class="content-wrapper">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="display: flex; justify-content: space-between;">
                    <h2>
                        Customers / Update customer
                    </h2>
                    <div style="display: flex; background-color: #fff; align-items: flex-start; gap: 1rem;">
                        <a class="nav-link d-block p-0" href="index.php">
                            <span class="btn btn-primary">
                                Back to Dashboard
                            </span>
                        </a>
                        <a class="nav-link d-block p-0" href="customers-list.php">
                            <span class="btn btn-primary">
                                Customer's list
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
                <?php if (!empty($errors)): ?>
                    <div class="row" style="margin: 0; position: relative;" id="message-alert">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div style="width: 90%;">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
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
                            Name
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?= isset($datas['name']) ? $datas['name'] : ''; ?>"
                                   placeholder="name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">
                            Email
                        </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email"
                                   value="<?= isset($datas['email']) ? $datas['email'] : ''; ?>"
                                   placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">
                            Phone N°
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone"
                                   value="<?= isset($datas['phone']) ? $datas['phone'] : ''; ?>"
                                   placeholder="Phone N°"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">
                            Password
                        </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">
                            Gender
                        </label>
                        <div class="col-sm-9">
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="Male" <?= isset($datas['gender']) && $datas['gender'] === "Male" ? 'selected="selected"' : ''; ?>>
                                    Male
                                </option>
                                <option value="Female" <?= isset($datas['gender']) && $datas['gender'] === "Female" ? 'selected="selected"' : ''; ?>>
                                    Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profession" class="col-sm-3 col-form-label">
                            Profession
                        </label>
                        <div class="col-sm-9">
                            <select name="profession" id="profession" class="form-select" required>
                                <option <?= !isset($datas['profession']) ? 'selected="selected"' : ''; ?> disabled>
                                    Select Profession
                                </option>
                                <option value="pharmacist" <?= isset($datas['profession']) && $datas['profession'] === "pharmacist" ? 'selected="selected"' : ''; ?>>
                                    Pharmacist
                                </option>
                                <option value="doctor" <?= isset($datas['profession']) && $datas['profession'] === "doctor" ? 'selected="selected"' : ''; ?>>
                                    Medical Doctor
                                </option>
                                <option value="delegate" <?= isset($datas['profession']) && $datas['profession'] === "delegate" ? 'selected="selected"' : ''; ?>>
                                    Medical Delegate
                                </option>
                                <option value="hospital" <?= isset($datas['profession']) && $datas['profession'] === "hospital" ? 'selected="selected"' : ''; ?>>
                                    Hospital
                                </option>
                            </select>
                        </div>
                    </div>
                    <!--                    <div class="form-check form-check-flat form-check-primary">-->
                    <!--                        <label class="form-check-label">-->
                    <!--                            <input type="checkbox" class="form-check-input"/> Remember me </label>-->
                    <!--                    </div>-->
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
