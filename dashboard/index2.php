<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Best Customer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/public/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/public/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/public/assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="/public/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/public/assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/public/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            
            <div class="d-flex align-items-center justify-content-between">
              <a href="index.html"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> 
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="/public/assets/images/faces/face17.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">PIEUMI SEPLONG</span>
                <span class="text-secondary icon-sm text-center">Pediatrician</span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="login.php">
               <!-- <img class="sidebar-brand-logo" src="/public/assets/images/logo2.svg" alt="" />
              <img class="sidebar-brand-logomini" src="/public/assets/images/logo-mini.svg" alt="" /> -->
              <div class="small font-weight-light pt-1">Customer Dashboard</div>
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
            <a class="nav-link" href="login.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="products-customer.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">PRODUCTS IN STOCK</span>
            </a>
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
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
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
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/public/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                
              
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="index.php">
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
           
              <a class="nav-link d-block" href="customers-list.php">
            <div class="row">
              <div class="col-sm-6 col-xl-12 stretch-card grid-margin">
                <div class="card color-card-wrapper">


                    <div class="card-body">
                    <img class="img-fluid card-top-img w-100" src="/public/assets/images/dashboard/img_5.jpg" alt="" />
                    <div class="d-flex flex-wrap justify-content-around color-card-outer">
                      <div class="col-6 p-0 mb-4">
                        
                        
                      </div>
                    </a>
                    
                    <a class="nav-link d-block" href="products-customer.php">
                        
                      <div class="col-6 p-0 mb-4">
                        <div class="color-card bg-success m-auto">
                          <i class="mdi mdi-plus-circle"></i>
                          <p class="font-weight-semibold mb-0">CONSULT PRODUCTS</p>
                          
                          <span class="small">01</span>
                        </div>
                      </div>
                    </a>
                    <a class="nav-link d-block" href="orders-list.php">
                      <div class="col-6 p-0">
                       
                      </div>
                    </a>
                    <a class="nav-link d-block" href="infos-list.php">
                      <div class="col-6 p-0">
                        
                      </div>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="#" target="_blank">Pharmaceuticalms</a>. All rights reserved.</span>
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
    <script src="/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/public/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="/public/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/public/assets/vendors/flot/jquery.flot.js"></script>
    <script src="/public/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="/public/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="/public/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="/public/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="/public/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/public/assets/js/off-canvas.js"></script>
    <script src="/public/assets/js/hoverable-collapse.js"></script>
    <script src="/public/assets/js/misc.js"></script>
    <script src="/public/assets/js/settings.js"></script>
    <script src="/public/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/public/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>