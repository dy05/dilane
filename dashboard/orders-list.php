<?php
$menu = 'orders';
include_once 'partials/header.php';
?>
<div class="content-wrapper">
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ordered Products</h4>

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
                <th>Attribute</th>
                <th>Quantity cartons</th>
                <th>Price FCFA</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <tr class="table-info">
                <td>1</td>
                <td>Patipa Prince Zidane</td>
                <td>Amoxicilin 200mg <br>
                  Penicillin 500g<br>
                  Gant sterile<br>
                </td>
                <td>50 <br>
                24 <br>
            70</td>
                <td>2000 <br>
                600 <br>
            907</td>
            <td>
            <div class="template-demo">
              <button type="button" class="btn btn-danger btn-icon-text">
                <i class="mdi mdi-upload btn-icon-prepend"></i> Download Command </button>
            </div>
            </td>

              </tr>


            </tbody>
          </table>
          <a href="index.php">
          <div class="template-demo">
            <button type="button" class="btn btn-primary">Back to Dashboard </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include_once 'partials/footer.php';
?>
