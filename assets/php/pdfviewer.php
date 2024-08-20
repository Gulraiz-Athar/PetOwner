<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}
 
 include("function.php");
include("../../services/database.php");



 $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '100'");
 $row_invoice_det = mysqli_fetch_assoc($invoices);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            background: #fff;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .invoice-logo {
            width: 150px; /* Adjust size as needed */
        }
        .invoice-number {
            text-align: right;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
        }
        .invoice-details {
            text-align: right;
            margin-left: auto; /* Push to the right side */
        }
        .to-info {
            flex-grow: 1; /* Take remaining space */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <div class="invoice-logo">
                <img src="path_to_your_logo.png" alt="Logo">
            </div>
            <div class="invoice-number">
                <h2>Invoice</h2>
                <p>Invoice Number: 100 </p>
                <p>Date: <?php echo date('Y-m-d'); ?></p>
                <!-- You can add more invoice details here -->
            </div>
        </div>
            <div class="" >
                <p><strong style="text-align:left;">To:</strong> <strong style="float:right;">From:</strong></p>
                <p><strong style="text-align:left;">Name: <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['name']; ?></strong> <strong style="float:right;">Name: <?php echo $_SESSION['login_users']['name']; ?></strong></p>
                <p><strong style="text-align:left;">Email: <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['email']; ?></strong> <strong style="float:right;">Email: <?php echo $_SESSION['login_users']['email']; ?></strong></p>
                <p><strong style="text-align:left;">Phone: +1234567890</strong> <strong style="float:right;">Phone : +2329323922</strong></p>
            </div>
        <table>
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Date Issued</th>
                    <th>Exp Date</th>
                    <th>Delivery Status</th>
                    <th>Invoice Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $row_invoice_det['id'] ?></td>
                    <td> <?php   $date = $row_invoice_det['created_at'];
                         $old_date_timestamp = strtotime($date);
                                        echo $new_date = date('Y/m/d', $old_date_timestamp); 
                                                                    ?>
                                                         </td>
                    <td>  <?php   $date = $row_invoice_det['created_at'];
                                                     $old_date_timestamp = strtotime($date);
                                                                    echo $new_date = date('Y/m/d', $old_date_timestamp); 
                                                                    ?></td>
                    <td><?php
                                                                        if($row_invoice_det['status'] == '1'){?>
                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                        <?php }else if($row_invoice_det['status'] == '2'){?>
                                                                             <span class="badge bg-soft-info text-info">New</span>
                                                                        <?php }else if($row_invoice_det['status'] == '3'){?>
                                                                            <span class="badge bg-soft-danger text-danger">Pending</span>
                                                                        <?php }else if($row_invoice_det['status'] == '4'){?>
                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                        <?php }
                                                                        ?></td>
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
                                                                        ?></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                    <td><strong>$180.00</strong></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                    <td><strong>$180.00</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
