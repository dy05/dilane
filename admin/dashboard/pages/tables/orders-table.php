<!DOCTYPE php>
<php lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="../../../assets/images/faces/face1.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">Franck Seplong</span>
                <span class="text-secondary icon-sm text-center">Pharmacist</span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="../../index.php">
              <img class="sidebar-brand-logo" src="../../../assets/images/logo.svg" alt="" />
              <img class="sidebar-brand-logomini" src="../../../assets/images/logo-mini.svg" alt="" />
              <div class="small font-weight-light pt-1">Admin Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Overall View</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="customer-table.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Registered customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product-table.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Total products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders-table.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Number of order</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="get_in_touch-table.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Get in touch info</span>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
              </ul>
            </div>
          </li>
         </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.php -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Transparent
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:../../partials/_navbar.php -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                
              
            
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="../../index.php">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
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
                      <a href="../../index.php"> 
                      <div class="template-demo">
                        <button type="button" class="btn btn-primary">Back to Dashboard </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.php -->
          <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" target="_blank">PFG Dash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer> -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</php>