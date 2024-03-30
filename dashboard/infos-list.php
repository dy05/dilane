<?php
$menu = 'infos';
include_once 'partials/header.php';
?>
<div class="content-wrapper">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Get in touch</h4>

                <form class="d-flex align-items-center" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search"/>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-info">
                            <td>1</td>
                            <td>Patipa Prince Zidane</td>
                            <td>dilane@gmail.com</td>
                            <td>we need to know if you have unicrax 200mg</td>
                            <td>
                                <div class="template-demo">
                                    <button type="button" class="btn btn-labeled btn-danger"> Delete <i
                                                class="mdi mdi-trash btn-icon-trash"></i>
                                    </button>
                                </div>
                            </td>


                        </tbody>
                    </table>
                    <a class="nav-link d-block" href="index.php">
                        <div class="template-demo">
                            <button type="button" class="btn btn-primary">Back to Dashboard</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
