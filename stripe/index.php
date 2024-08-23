<?php 
// Include configuration file  
require_once 'config.php'; 
include("../services/database.php");

$stripe_invoice_id = $_GET['id'];
$invoice = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `stripe_invoice_id` = '$stripe_invoice_id'");
$row_invoice = mysqli_fetch_assoc($invoice);
$price = $row_invoice['paid_to_vet'];
$stripe_customer = $row_invoice['stripe_customer_invoice'];
$invoice_id = $row_invoice['id'];

?> <?php include('includes/header.php'); ?> 
<div class="panel">
  <div class="panel-heading"></div>
  <div class="panel-body">
    <!-- Display status message -->
    <div id="paymentResponse" class="hidden"></div>
    <!-- Display a payment form -->
    <form id="paymentFrm" class="hidden">
      <input type="hidden" name="price" id="price" value="<?= $price; ?>">
      <input type="hidden" name="stripe_invoice_id" id="stripe_invoice_id" value="<?= $stripe_invoice_id; ?>">
      <input type="hidden" name="invoice_id" id="invoice_id" value="<?= $invoice_id; ?>">
      <input type="hidden" name="pet_id" id="pet_id" value="<?= $_GET['pet_id']; ?>">
      <input type="hidden" name="stripe_customer" id="stripe_customer" value="<?= $stripe_customer; ?>">
      <div class="form-group">
        <label>EMAIL</label>
        <input type="email" id="email" name="email" class="field" placeholder="Enter email" required>
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
      <button class="btn btn-primary" onClick="window.location.href=window.location.href.split('?')[0]">
        <i class="rload"></i>Re-initiate Payment </button>
    </div>
  </div>
</div>