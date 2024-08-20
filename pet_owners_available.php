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
    $title = "Pet Owners";
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

    $createvaterinaries = mysqli_query($conn,"SELECT * FROM `vetprofiles`");
    $createpetowners = mysqli_query($conn,"SELECT * FROM `user` WHERE `role` = 'petowner'");


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
                                            <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editnewinvoice" role="button">Create Invoice</a>

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
                                            <tbody>
                                            <?php
                                                $i = 1;
                                                while ($petownersall = mysqli_fetch_assoc($createpetowners)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal"><?php echo $i++ ?></h5>
                                                        </td>
                                                        
                                                        <td>
                                                            <h5 class="m-0 fw-normal"><a href="profile_view.php?id=<?php echo $petownersall['id']; ?>"><?php echo $petownersall['name']; ?></a></h5>
                                                        </td>
                                                        
                                                        <td>
                                                            <h5 class="m-0 fw-normal"><?php echo $petownersall['email']; ?></h5>
                                                        </td>

                                                        <td>
                                                           <a href="pet_owner_invoices.php?id=<?php echo $petownersall['id']; ?>" >
                                                                <i style="font-size:25px;color:grey;" class="mdi mdi-eye"></i>
                                                              
                                                            </a>
                                                            
                                                            <!--<a href="create_invoice.php?id=<?php echo $petownersall['id']; ?>" >-->
                                                            <!--    <i style="font-size:25px;color:grey;" class="mdi mdi-file-plus"></i>-->
                                                                <!--<span>New Invoice</span>-->
                                                            <!--</a>-->
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