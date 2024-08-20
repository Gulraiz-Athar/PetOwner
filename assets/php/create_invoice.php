<?php session_start();
include("../../services/database.php");
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
// Include the Stripe PHP library 
require_once '../../stripe/stripe-php/init.php'; 


// Set your secret key
\Stripe\Stripe::setApiKey('sk_test_51It6TrL6Rl64VutZyFpmIiZppU7UArmlS5ABNCnRW6enBJEkLj3iofmASXpXpeiEm8kPW9uHqklLF2aNrDZyqVz700P9KoRkBw'); // Replace with your actual secret key



    $veterinary_id = $_SESSION['login_users']['id'];
    $username = $_SESSION['login_users']['name'];
    $petowner_id = $_POST['petowner_id'];

    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$petowner_id'");
    $row_users = mysqli_fetch_assoc($user_data);
    $email = $row_users['email'];
    $name = $row_users['name'];


    $paid_to_vet = $_POST['cost'];
    $units = $_POST['units'];
    $now = new DateTime();
    $date = $now->format('Y-m-d');
    
    // Create a customer
$customer = \Stripe\Customer::create([
    'name' => $name,
    'email' =>  $email,
]);

$itemPriceCents  = round($paid_to_vet*100); 
   

\Stripe\InvoiceItem::create([
    'customer' => $customer->id,
    'amount' => $itemPriceCents,
    'currency' => 'usd',
]);

// Create and finalize the invoice
$invoice = \Stripe\Invoice::create([
    'customer' => $customer->id,
]);

  $invoice->finalizeInvoice();

$stripe_invoice_id = $invoice->id;
$stripe_customer = $invoice->customer;

      $query = mysqli_query($conn,"INSERT INTO `invoices`(`veterinarian_id`, `pet_owner_id`, `paid_to_vet`, `units`, `status`, `invoice_date`, `stripe_invoice_id`, `stripe_customer_invoice`) VALUES ('$veterinary_id','$petowner_id','$paid_to_vet','$units', '2', '$date', '$stripe_invoice_id', '$stripe_customer')");
      $invoice_id = $conn->insert_id;

echo $invoice_id;


?>