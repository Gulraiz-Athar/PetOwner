<?php
session_start();
check_session($_SESSION['material_user']);

include 'partials/main.php';
?> <head> <?php
    $title = "Users";
    include 'partials/title-meta.php';
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");
    $user = mysqli_query($conn,"SELECT * FROM `user` WHERE role != 'admin'");
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
                <h4 class="page-title">Users</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title mb-3">Users History</h4>
                  <div class="table-responsive">
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                      <thead>
                        <tr>
                          <th>Name & Email</th>
                          <th>Role</th>
                          <th>Login Status</th>
                          <th>Registered At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> <?php    
                            $is_paid = true;
                            while($row_users = mysqli_fetch_assoc($user)){
                            ?> <tr>
                          <td>
                            <h5 class="m-0 fw-normal"> <?=$row_users['name']?> </h5>
                            <p class="mb-0 text-muted">
                              <small>
                                <a href="mailto:<?=$row_users['email']?>"> <?=$row_users['email']?> </a>
                              </small>
                            </p>
                          </td>
                          <td> <?php if(ucfirst($row_users['role'] == "petowner")){ ?> <p>Pet Owner</p> <?php }
                              else{ echo ucfirst($row_users['role']);  } ?> </td>
                          <td>
                            <?php if($row_users['is_enable'] == 1){ ?> <span class="badge bg-soft-success text-success">Active</span> <?php }
                            else{ ?> <span class="badge bg-soft-danger text-danger">Not Active</span> <?php } ?>
                          </td>
                          <td> <?=$row_users['created_at']?> </td>
                          <td>
                            <a href="users_invoices.php?id=<?php echo $row_users['id']; ?>">
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
      <!-- content -->
      <?php include 'partials/footer.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>