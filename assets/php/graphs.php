<?php session_start();
include("../../services/database.php");

$role = $_SESSION['login_users']['role'];
$id = $_SESSION['login_users']['id'];
$array = [];

if($role == "petowner"){
    
$get_invoices = mysqli_query($conn, "SELECT sum(paid_amount) as total, created  FROM `transactions` WHERE `user_id` = '$id' GROUP BY created");
while($daily_invoice_price = mysqli_fetch_assoc($get_invoices)){
    array_push($array,$daily_invoice_price );
}
    print_r(json_encode($array));
}else if($role == "veterinarian"){
    $get_invoices = mysqli_query($conn, "SELECT sum(paid_amount) as total, created  FROM `transactions` WHERE `veterinarian_id` = '$id' GROUP BY created");
    while($daily_invoice_price = mysqli_fetch_assoc($get_invoices)){
        array_push($array,$daily_invoice_price );
    }

   print_r(json_encode($array));
}else{
    
    $get_invoices = mysqli_query($conn, "SELECT sum(paid_amount) as total, created  FROM `transactions` GROUP BY created");
    while($daily_invoice_price = mysqli_fetch_assoc($get_invoices)){
        array_push($array,$daily_invoice_price );
    }
    print_r(json_encode($array));
}







    


?>