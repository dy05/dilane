<?php
$menu = 'customers';
include_once 'partials/header.php';
?>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Registration form</h4>
            <p class="card-description">Register a new customer</p>
            <form class="forms-sample">
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputUsername2" placeholder="name" />
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" />
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone N°</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputPhoneN°" placeholder="Phone N°" />
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Profession</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="exampleInputProfession" placeholder="Profession" />
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" />
                </div>
              </div>
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" /> Remember me </label>
              </div>
              <button type="submit" class="btn btn-primary me-2"> Submit </button>
              <button class="btn btn-light">Cancel</button>
              <a class="nav-link d-block" href="index.php">
              <div class="template-demo">
                <button type="button" class="btn btn-primary">Back to Dashboard </button>
               </div>
              </a>
              </a>
            </form>
          </div>
        </div>
    </div>
</div>
<?php
include_once 'partials/footer.php';
?>
