<?php

function get_result($conn,$id,$table){
    $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `$table` WHERE `id` = '$id'"));
    return $query;
}

function check_session($session){
    if (!isset($session)) {
        header('Location: auth-login.php');
        exit();
    }
}

function current_date($date){
    $old_date_timestamp = strtotime($date);
    echo date('Y/m/d', $old_date_timestamp);
}

function exp_date($date){
    $old_date_timestamp = strtotime($date);
    echo date('Y/m/d', $old_date_timestamp);
}

function get_result_users($conn,$id){
    $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `user_info` WHERE `user_id` = '$id'"));
    return $query;
}

function get_invoice_count($conn, $id){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `veterinarian_id` = '$id'");
    return mysqli_num_rows($invoice_count);
}

function get_invoice_count_petowner($conn, $id){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `pet_owner_id` = '$id'");
    return mysqli_num_rows($invoice_count);
}

function get_invoice_count_admin($conn){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `invoices`");
    return mysqli_num_rows($invoice_count);
}


function get_pet_owners_count($conn){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` = 'petowner'");
    return mysqli_num_rows($invoice_count);
    
}

function get_admin_count($conn){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `user`");
    return mysqli_num_rows($invoice_count);
    
}


function get_revenue_count_vet($conn, $id){
    
    $invoice_count = mysqli_query($conn, "SELECT sum(paid_amount) as total FROM `transactions` WHERE `veterinarian_id` = '$id'");
      $number_format = number_format(mysqli_fetch_assoc($invoice_count)['total'], 0, '.', '');
     return $formatted_num = number_format($number_format, 0, '.', ',');
}

function get_revenue_count_day($conn, $id){
    
     $current_date = date('Y-m-d');

    
    $invoice_count = mysqli_query($conn, "SELECT sum(paid_amount) as total FROM `transactions` WHERE `veterinarian_id` = '$id' AND `created` LIKE '%$current_date%'");
    $number_format = number_format(mysqli_fetch_assoc($invoice_count)['total'], 0, '.', '');
    
   return $formatted_num = number_format($number_format, 0, '.', ',');
    
}



function get_revenue_count_pet($conn, $id){
    
    $invoice_count = mysqli_query($conn, "SELECT sum(paid_amount) as total FROM `transactions` WHERE `user_id` = '$id'");
    return mysqli_fetch_assoc($invoice_count)['total'];
    
}

function get_revenue_count_admin($conn){
    
    $invoice_count = mysqli_query($conn, "SELECT sum(paid_amount) as total FROM `transactions`");
    return mysqli_fetch_assoc($invoice_count)['total'];
    
}


function get_pet_owners_invoices_count($conn, $id){
    
    $invoice_count = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `pet_owner_id` = '$id'");
    return mysqli_num_rows($invoice_count);
    
}


