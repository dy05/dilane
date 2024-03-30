<?php
$menu = 'customers';
include_once 'partials/header.php';
?>
<div class="content-wrapper">
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Registered customers</h4>

            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                 <div class="input-group-prepend">
                 <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                 <input type="text" class="form-control border-0" placeholder="Search" />
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
                        <th>role</th>
                        <th>Profession</th>
                        <th>Password</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="table-info">
                        <td>1</td>
                        <td>Patipa Prince Zidane</td>
                        <td>658183169</td>
                        <td>dilane@gmail.com</td>
                        <td>customer</td>
                        <td>medical doctor hgopeg</td>
                        <td>C"GX23&kjs89uh</td>
                        <td>
                        <div class="template-demo">
                        <button type="button" class="btn btn-danger btn-icon-text"> Update <i class="mdi mdi-file-check btn-icon-append"></i>
                      </button>
                      <button type="button" class="btn btn-labeled btn-danger"> Delete <i class="mdi mdi-trash btn-icon-trash"></i>
                      </button>
                    </div>
                        </td>
                      </tr>


                    </tbody>
                  </table>
                  <a class="nav-link d-block" href="index.php">
                  <div class="template-demo">
                    <button type="button" class="btn btn-primary">Back to Dashboard </button>
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