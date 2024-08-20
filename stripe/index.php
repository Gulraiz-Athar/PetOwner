<?php 
// Include configuration file  
require_once 'config.php'; 
    include("../services/database.php");

$inv_id = $_GET['id'];
$invoice = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `stripe_invoice_id` = '$inv_id'");
$row_invoice = mysqli_fetch_assoc($invoice);
$price = $row_invoice['paid_to_vet'];
$stripe_customer = $row_invoice['stripe_customer_invoice'];
$invoice_id = $row_invoice['id'];

?>

<style>

    body{
        
        background-image:url('pets_hospital.jpg');
         background-size: cover;
        
    }
    
</style>

<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>

<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/checkout.js" STRIPE_PUBLISHABLE_KEY="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" defer></script>

<div class="panel" style="">
    <div class="panel-heading">
      
    </div>
    <div class="panel-body">
        <!-- Display status message -->
        <div id="paymentResponse" class="hidden"></div>
        
        <!-- Display a payment form -->
        <form id="paymentFrm" class="hidden">
            <input type="hidden" name="price" id="price" value="<?php echo $price; ?>">
            <input type="hidden" name="stripe_invoice_id" id="stripe_invoice_id" value="<?php echo $inv_id; ?>">
            <input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo $invoice_id; ?>">
           
            
            <input type="hidden" name="pet_id" id="pet_id" value="<?php echo $_GET['pet_id']; ?>">
            <input type="hidden" name="stripe_customer" id="stripe_customer" value="<?php echo  $stripe_customer; ?>">
           
            
            
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" id="email" name="email" class="field" placeholder="Enter email" required="">
            </div>
            
            <div id="paymentElement">
              
                <!--Stripe.js injects the Payment Element-->
            </div>
            
            <!-- Form submit button -->
            <button id="submitBtn" class="btn btn-success">
                <div class="spinner hidden" id="spinner"></div>
                <span id="buttonText">Pay Now</span>
            </button>
        </form>
        
        <!-- Display processing notification -->
        <div id="frmProcess" class="hidden">
            <span class="ring"></span> Processing...
        </div>
        
        <!-- Display re-initiate button -->
        <div id="payReinit" class="hidden">
            <button class="btn btn-primary" onClick="window.location.href=window.location.href.split('?')[0]"><i class="rload"></i>Re-initiate Payment</button>
        </div>
    </div>
</div>