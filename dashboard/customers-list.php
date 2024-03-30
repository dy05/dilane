<?php
$menu = 'customers';
include_once '../App.php';
App::redirectIfNotConnect();
$pdo = App::getPDO();
$user = $_SESSION['user'];
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM user WHERE id != " . $user->id . " AND role = 'customer'";
if (!empty($search)) {
    $query .= " AND (name like '%" . $search . "%'";
    $query .= " OR username like '%" . $search . "%'";
    $query .= " OR phone like '%" . $search . "%')";
}
$customers = $pdo->query($query)->fetchAll();
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
                            Customers
                        </h2>
                        <div style="display: flex; background-color: #fff; align-items: flex-start; gap: 1rem;">
                            <a class="nav-link d-block p-0" href="index.php">
                                <span class="btn btn-primary">
                                    Back to Dashboard
                                </span>
                            </a>
                            <a class="nav-link d-block p-0" href="customer-add.php">
                                <span class="btn btn-primary">
                                    Add new customer
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="d-flex align-items-center mb-2" action="">
                        <div class="input-group">
                            <label class="input-group-prepend" for="search">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </label>
                            <input type="text" class="form-control border-0" value="<?= $search; ?>"
                                   name="search" id="search" placeholder="Search"/>
                            <button type="submit" class="btn btn-primary">
                                Find
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone N°</th>
                                <th>Email</th>
                                <th>Profession</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($customers as $customer): ?>
                                <tr class="table-info">
                                    <td><?= $customer->id; ?></td>
                                    <td><?= $customer->name; ?></td>
                                    <td><?= $customer->phone; ?></td>
                                    <td><?= $customer->username; ?></td>
                                    <td><?= $customer->profession; ?></td>
                                    <td>
                                        <div class="template-demo"
                                             style="display: flex !important; justify-items: start !important;">
                                            <a href="<?= SITE_URL; ?>/dashboard/customer-edit.php?id=<?= $customer->id; ?>"
                                               class="btn btn-danger btn-icon-text">
                                                <i class="mdi mdi-pencil btn-icon-append"></i>
                                                Update
                                            </a>
                                            <form onsubmit="return confirm('Do you confirm the suppression of the customer ?');"
                                                  method="POST" id="delete-customer-<?= $customer->id; ?>"
                                                  action="<?= SITE_URL; ?>/dashboard/customer-delete.php">
                                                <input type="hidden" name="id" value="<?= $customer->id; ?>"/>
                                            </form>
                                            <a href="<?= SITE_URL; ?>/dashboard/customer-delete.php"
                                               onclick="event.preventDefault(); if (confirm('Do you confirm the suppression of the customer ?')) document.getElementById('delete-customer-<?= $customer->id; ?>')?.submit()"
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