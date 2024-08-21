<?php
session_start();
check_session($_SESSION['material_user']);

?> <head> <?php
    $title = "Pet Owners";
    include 'partials/main.php';
    include 'partials/title-meta.php';
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");
    $petprofile = mysqli_query($conn,"SELECT * FROM `user` WHERE `role` = 'petowner'");
    ?>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <form class="d-flex align-items-center mb-3">
                </div>
                <h4 class="page-title">Pet Owners</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editnewinvoice" role="button">Create Invoice</a>
                    </div>
                  </div>
                  <h4 class="header-title mb-3">Pet Owners Details</h4>
                  <div class="table-responsive">
                    <table id="invoice-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                      <thead class="table-light">
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> <?php $i = 1;
                          while ($petprofiles = mysqli_fetch_assoc($petprofile)) { ?> 
                          <tr>
                          <td>
                            <h5 class="m-0 fw-normal"> <?php echo $i++ ?> </h5>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal">
                              <a href="profile_view.php?id=<?php echo $petprofiles['id']; ?>"> <?php echo $petprofiles['name']; ?> </a>
                            </h5>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal"> <?php echo $petprofiles['email']; ?> </h5>
                          </td>
                          <td>
                            <a href="pet_owner_invoices.php?id=<?php echo $petprofiles['id']; ?>">
                              <i style="font-size:25px;color:grey;" class="mdi mdi-eye"></i>
                            </a>
                          </td>
                        </tr> <?php } ?> 
                    </tbody>
                    </table>
                  </div>
                  <!-- end .table-responsive-->
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- container -->
      </div>
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>