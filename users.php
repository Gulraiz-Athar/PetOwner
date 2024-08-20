<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}

include 'partials/main.php';
?>

<head>
    <?php
    $title = "Users";
    include 'partials/title-meta.php'; ?>

    <!-- Plugins css -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <?php include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");


$users = mysqli_query($conn,"SELECT * FROM `user` WHERE role != 'admin'");


    ?>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include 'partials/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <?php include 'partials/topbar.php'; ?>

            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex align-items-center mb-3"></div>
                                <h4 class="page-title">Users</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <!--<div class="dropdown float-end">-->
                                    <!--    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">-->
                                    <!--        <i class="mdi mdi-dots-vertical"></i>-->
                                    <!--    </a>-->
                                    <!--    <div class="dropdown-menu dropdown-menu-end">-->
                                            <!-- item-->
                                    <!--        <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editnewinvoice" role="button">Create Invoice</a>-->

                                    <!--    </div>-->
                                    <!--</div>-->

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
                                        
                                            <tbody>
                                            <?php
                                            
                                                $is_paid = true;
                                                while($row = mysqli_fetch_assoc($users)){
                                                // while(1){
                                                    // echo "ok123";
                                                ?>
                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 fw-normal"><?=$row['name']?></h5>
                                                        <p class="mb-0 text-muted"><small><a href="mailto:<?=$row['email']?>"><?=$row['email']?></a></small></p>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        
                                                        if(ucfirst($row['role'] == "petowner")){ ?>
                                                          <p>Pet Owner</p>
                                                        <?php }else{ 
                                                            
                                                         echo ucfirst($row['role']); 
                                                         
                                                            
                                                        }
                                                        
                                                        
                                                        ?>
                                                    </td>
                                                     
                                                    <td>
                                                        <!--$row['is_enable']?>-->
                                                        <?php if($row['is_enable'] == 1){ ?>
                                                         
                                                            <span class="badge bg-soft-success text-success">Active</span>
                                                         
                                                        <?php }else{ ?>
                                                         
                                                            <span class="badge bg-soft-danger text-danger">Not Active</span>
                                                         
                                                        <?php } ?>
                                                        
                                                        
                                                        
                                                        
                                                    </td>
                                                    <td>
                                                        <?=$row['created_at']?>
                                                    </td>
                                                    <td>
                                                        
                                                        <a href="users_invoices.php?id=<?php echo $row['id']; ?>" >
                                                                <i style="font-size:25px;color:grey;" class="mdi mdi-eye"></i>
                                                              
                                                            </a>
                                                        
                                                        
                                                        <!--<a href="javascript: void(0);" class="btn btn-xs btn-danger delete-btn-user" data_id="<?=$row['id']?>"><i class="mdi mdi-minus"></i></a>-->
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->
            <div id="editnewinvoice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                        <form id="invoice_create" method="POST">

                            <div class="mb-3">
                            <label for="fullname" class="form-label">Invoice No</label>
                            <input class="form-control" type="text" placeholder="Enter your invoice no" name="invoiceno" required>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Select Veterinary</label>
                            <select name="veterinary_id" id="" class="form-control">
                                <?php
                                while($vaternaryall = mysqli_fetch_assoc($createvaterinaries)){
                                ?>
                                <option value="<?=$vaternaryall['id']?>"><?=$vaternaryall['name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Select Pet Owner</label>
                            <select name="petowner_id" id="" class="form-control">
                                <?php
                                while($petownerall = mysqli_fetch_assoc($createpetowners)){
                                ?>
                                <option value="<?=$petownerall['id']?>"><?=$petownerall['name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Veterinary Paid</label>
                            <input class="form-control" type="number" placeholder="Enter your vaterinary paid amount less than $127" name="vaterinary" required="">
                            </div>
                            <div class="mb-3">
                            <label for="fullname" class="form-label">Petowners Paid</label>
                            <input class="form-control" type="number" placeholder="Enter your petowners paid amount " name="petowner" required="">
                            </div>
                            <div class="text-center d-grid">
                            <button class="btn btn-success submit_invoice" name="submit_invoice"> Create New Invoice</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include 'partials/right-sidebar.php'; ?>

    <?php include 'partials/footer-scripts.php'; ?>

    <!-- Plugins js-->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/datatables.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/authentication.init.js"></script>

</body>

</html>