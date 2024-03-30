<?php
$menu = 'customers';
include_once '../App.php';
App::redirectIfNotConnect();
$pdo = App::getPDO();
$user = $_SESSION['user'];
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM user WHERE id != " . $user->id;
// $query = "SELECT * FROM user WHERE id != " . $user->id . " AND role = 'customer'";
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
        <div class="alert alert-<?= $success ? 'info' : 'danger';?> alert-dismissible" role="alert">
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
                    <h4 class="card-title">
                        Customers
                    </h4>

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
                                            <a href="#" class="btn btn-danger btn-icon-text">
                                                <i class="mdi mdi-pencil btn-icon-append"></i>
                                                Update
                                            </a>
                                            <form method="POST" id="delete-customer-<?= $customer->id; ?>"
                                                  action="<?= SITE_URL; ?>/dashboard/customer-delete.php">
                                                <input type="hidden" name="id" value="<?= $customer->id; ?>"/>
                                            </form>
                                            <a href="<?= SITE_URL; ?>/dashboard/customer-delete.php"
                                               onclick="event.preventDefault(); document.getElementById('delete-customer-<?= $customer->id; ?>')?.submit()"
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
                        <a class="nav-link d-block" href="index.php" style="padding-left: 0">
                            <div class="template-demo m-0">
                                <span class="btn btn-primary">
                                    Back to Dashboard
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'partials/footer.php';
?>