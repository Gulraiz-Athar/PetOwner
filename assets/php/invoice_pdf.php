<?php session_start();
require_once '../../dompdf/vendor/autoload.php'; // Adjust the path as necessary
 include("function.php");
include("../../services/database.php");
 $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '100'");
 $row_invoice_det = mysqli_fetch_assoc($invoices);
 $price= $row_invoice_det['paid_to_vet'];
 $date = $row_invoice_det['created_at'];
                     $old_date_timestamp = strtotime($date);
                        $new_date = date('Y/m/d', $old_date_timestamp) ;
                                   
                         

use Dompdf\Dompdf;

    // Get HTML content from your invoice template (assuming it's stored in a file or variable)
    ob_start();
    // require_once 'pdfviewer.php'; // Path to your HTML invoice template file
    $html = '<!DOCTYPE html>
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
            
            <div class="invoice-number">
                <h2>Invoice</h2>
                <p>Invoice Number:' .$row_invoice_det['id'].' </p>
                <p>Date:20-10-2024</p>
                <!-- You can add more invoice details here -->
            </div>
        </div>
            <div class="" >
            
                <p><strong style="text-align:left;">To:</strong> <strong style="float:right;">From:</strong></p>
                <p><strong style="text-align:left;">Name: '. get_result($conn,$row_invoice_det['pet_owner_id'],'user')['name'].'</strong> <strong style="float:right;">Name: '. $_SESSION['login_users']['name']. '</strong></p>
                <p><strong style="text-align:left;">Email: '. get_result($conn,$row_invoice_det['pet_owner_id'],'user')['email'] . '</strong> <strong style="float:right;">Email: '.$_SESSION['login_users']['email'] .'</strong></p>
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
                    <td>'.$row_invoice_det['id'].'</td>
                    <td>'.$new_date.'</td>
                    <td>'.$new_date. '</td>
                    <td>New</td>
                    <td>New</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Cost:</strong></td>
                    <td><strong>$'. $price.'</strong></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Service Fee:</strong></td>
                    <td><strong>$100.00</strong></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Delivery Fee:</strong></td>
                    <td><strong>$100.00</strong></td>
                </tr>
                
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                    <td><strong>$400.00</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>';

    // Initialize DomPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("invoice.pdf", array("Attachment" => false));
    
    // header('location:')
    
    exit();

?>