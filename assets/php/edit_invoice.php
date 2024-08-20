<?php session_start();
include("../../services/database.php");

    $veterinary_id = $_SESSION['login_users']['id'];
    $username = $_SESSION['login_users']['name'];
    $petowner_id = $_POST['petowner_id'];
    $invoice_id = $_POST['invoice_id'];

    $user_data = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$petowner_id'");
    $row_users = mysqli_fetch_assoc($user_data);
    $email = $row_users['email'];

    $paid_to_vet = $_POST['cost'];
    $units = $_POST['units'];
    $now = new DateTime();
    $date = $now->format('Y-m-d');
    
    
    
    $query = mysqli_query($conn,"UPDATE `invoices` SET `veterinarian_id`='$veterinary_id',`pet_owner_id`='$petowner_id',`paid_to_vet`='$paid_to_vet',`units`='$units' WHERE `id` = '$invoice_id'");
        
    if($query){
        
        echo $invoice_id;
        
    }
    

?>