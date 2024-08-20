<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}

include 'partials/main.php';
include("../../services/database.php");
?>

<head>
    <?php
    $title = "Invoices";
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

    $id = $_GET['id'];
    $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$id'");
    
    $get_percentage = mysqli_query($conn, "SELECT `percentage`, `delivery_fee` FROM `user` WHERE `role` = 'admin'");
    $row_percentage = mysqli_fetch_assoc($get_percentage);
    $percentage = $row_percentage['percentage'];
    $delivery_fee = $row_percentage['delivery_fee'];
   
    
    $createvaterinaries = mysqli_query($conn,"SELECT * FROM `vetprofiles`");
    $createpetowners = mysqli_query($conn,"SELECT * FROM `petowners`");

    $row_invoice_det = mysqli_fetch_assoc($invoices);

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
                                
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                   
                        <div class="row">
                        <div class="col-xl-12">
                            
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="container">
                                            <div class="row">
                                                <br>
                                                    <h2 style="padding-left:40px;padding-bottom:40px;padding-top:40px;" class="page-title">INVOICE</h2> 
                                                    
                                                
                                                <div class="col-md-6">
                                                    
                                                   
                                                    
                                                </div>    
                                                    
                                                <div class="col-md-6">
                                                    <img src="assets/images/mario_logo.png" alt="dark logo" style="width:150px;float:right;margin-bottom:65px;margin-right:70px;" class="logo-sm k">
                                                    <br><br>
                                                    
                                                    
                                                    <!--<h5>From : <?php echo $_SESSION['login_users']['name']; ?>-->
                                                    <!--<br><br>-->
                                                    <!--Email : <?php echo $_SESSION['login_users']['email']; ?> <br><br>-->
                                                   
                                                    <!--</h5>-->
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                <!--<div class="col-md-6">-->
                                                <!--    <br><br><br>-->
                                                <!--    <h3 class="text-center">INVOICE NO : <?php echo $row_invoice_det['id']; ?></h3>-->
                                                <!--     <br><br>-->
                                                <!--    <h5 class="text-center">To : <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['name']; ?>-->
                                                <!--    <br><br>-->
                                                <!--    Email : <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['email']; ?><br><br>-->
                                                  
                                                    
                                                <!--    </h5>-->
                                                    
                                                <!--</div>-->
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <h3><b>BILL To</b></h3>
                                                    
                                                    <h4>
                                                            
                                                        <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['name']; ?>
                                                        <br>
                                                        <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['email']; ?>
                                                        <br>
                                                        <?php echo get_result_users($conn,$row_invoice_det['pet_owner_id'])['address']; ?>
                                                    </h4>    
                                                </div>
                                                 <div class="col-md-6">
                                                     <!--<h3><b>BILL To</b></h3>-->
                                                    <br>
                                                    <h4 style="float:right;">
                                                            
                                                        Invoice no: &emsp; &emsp; &emsp; <?php echo $row_invoice_det['id']; ?>
                                                        <br>
                                                        Issue Date: &emsp; &emsp; &nbsp; <?php $date = $row_invoice_det['created_at'];
                                                                    
                                                                    $old_date_timestamp = strtotime($date);
                                                                    echo $new_date = date('d/m/Y', $old_date_timestamp); ?>
                                                        <br>
                                                        Exp Date: &emsp; &emsp; &emsp; <?php
                                                                    
                                                                    $date = $row_invoice_det['created_at'];
                                                                    
                                                                    $old_date_timestamp = strtotime($date. ' + 3 days');
                                                                    echo $new_date = date('d/m/Y', $old_date_timestamp); 
                                                                    
                                                                    
                                                                    ?>
                                                    </h4>    
                                                </div>
                                            </div>
                                             <div class="table-responsive">
                                                <table id="" class="table activate-select dt-responsive nowrap w-100">
                
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Invoice No</th>
                                                                    <th>Delivery Status</th>
                                                                    <th>Invoice Status</th>
                                                                    <!--<th>Units</th>-->
                                                                    <th>Cost</th>
                                                                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                      
                                                                            <tr>
                                                                                <td>
                                                                                    <h5 class="m-0 fw-normal"><?= $row_invoice_det['id'] ?></h5>
                                                                                </td>
                
                                                                                
                
                                                                                <td>
                                                                                    
                                                                                        <?php
                                                                                        if($row_invoice_det['status'] == '1'){?>
                                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '2'){?>
                                                                                             <span class="badge bg-soft-info text-info">New</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '3'){?>
                                                                                            <span class="badge bg-soft-danger text-danger">Pending</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '4'){?>
                                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                                        <?php }
                                                                                        ?>
                                                                                </td>
                                                                                
                                                                                                                                                <td>
                                                                                    
                                                                                        <?php
                                                                                        if($row_invoice_det['status'] == '1'){?>
                                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '2'){?>
                                                                                             <span class="badge bg-soft-info text-info">New</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '3'){?>
                                                                                            <span class="badge bg-soft-danger text-danger">Pending</span>
                                                                                        <?php }else if($row_invoice_det['status'] == '4'){?>
                                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                                        <?php }
                                                                                        ?>
                                                                                </td>
                                                                                
                                                                                <!--<td> <h5 class="m-0 fw-normal"><?= $row_invoice_det['units']; ?></h5></td>-->
                                                                               <td> <h5 class="m-0 fw-normal">$<?= $row_invoice_det['paid_to_vet']; ?>.00</h5></td>
                                                                               
                                                                               
                                                                        
                                                                            </tr>
                                                                            
                                                                            
                                                                       
                
                                                            </tbody>
                                                        </table>
                                            </div> <!-- end .table-responsive-->
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6"></div>
                                                
                                                
                                                <div class="col-md-6">
                                                    
                                                    <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;">
                                                    
                                                        <b>Fees(a percentage of goods):</b>   &nbsp;&nbsp;&emsp; &nbsp; &nbsp;   &emsp;   &emsp;&emsp; $<?php $new_width =  ($percentage / 100) * $row_invoice_det['paid_to_vet'];
                                                     
                                                    echo number_format((float)$new_width, 2, '.', '');
                                                     
                                                     ?>
                                                    </h4>
                                                    <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;margin-top: -10px;">
                                                    
                                                        <b>Delivery Fee:</b>  &emsp;   &emsp;&nbsp; &nbsp;&nbsp; &nbsp;    &emsp;  &emsp; &emsp;   &emsp;&emsp; &emsp;   &emsp;&emsp; $<?= $delivery_fee; ?>.00 
                                                    </h4>
                                                    
                                                    <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;margin-top: -10px;">
                                                    
                                                        <b>TOTAL (CAD):</b>  &emsp;   &emsp;&nbsp; &nbsp;&nbsp;     &emsp;  &emsp; &emsp;   &emsp;&emsp; &emsp;   &emsp;&emsp; $<?= $row_invoice_det['paid_to_vet'] ?>.00 
                                                    </h4>
                                                    
                                                    <h4 style="border: 1px solid black;padding: 7px;padding-top: 0px;padding-bottom: 13px;margin-top: -10px;background: red;color: white;"><br>
                                                        <b>TOTAL Due (CAD):</b>  &emsp;   &emsp; &nbsp;  &emsp;  &emsp;   &emsp;   &emsp;&emsp;    &emsp;&emsp; $<?php 
                                                      
                                                       $total = $row_invoice_det['paid_to_vet'] - $new_width;
                                                      echo number_format((float) $total, 2, '.', '') - $delivery_fee;
                                                       
                                                       ?>
                                                    </h4>
                                                    
                                                    <br>
                                                    
                                                    <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?>
                                                    
                                                    <button invoice_id="<?= $row_invoice_det['id']; ?>" class="btn btn-info send_invoice" style="float:right;">Send Invoice</button>
                                                    
                                                    <?php } ?>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
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
'
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
         <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/datatables.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/authentication.init.js"></script>
    
    <script>
    
        
         $(".send_invoice").click(function(){
           
           var invoice_id = $(this).attr('invoice_id');
          $.ajax({
              url: "assets/php/vet_sending_mail.php",
              method: 'post',
               data: {"invoice_id" : invoice_id,},
              success: function(petowner){
                 
                 Swal.fire({
                  icon: "success",
                  title: "Congratulation",
                  text: "Invoice Sent Successfully!",
                }).then((result) => {
                    
                    // window.location.href="pet_owner_invoices.php?id="+petowner;
                    location.reload();
                 
                });

              }
            });
            
            
        });
    
    
    </script>

</body>

</html>