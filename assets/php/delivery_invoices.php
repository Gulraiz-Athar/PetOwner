<?php 
    
    include("../../services/database.php");
    include 'function.php';
    
    
    if($_POST['flag'] == "invoice_no_data"){
        
        $id = $_POST['invoice_no'];
        
        $get_invoice_date = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$id'");
        
        $row_get_invoice = mysqli_fetch_assoc($get_invoice_date);
        
        $pet_owner_id = $row_get_invoice['pet_owner_id'];
        
        print_r(json_encode(get_result_users($conn,$pet_owner_id)));
        
        
    }
    
    if($_POST['flag'] == "invoice_no_data_one"){
        
        $id = $_POST['invoice_no'];
        
        $get_invoice_date = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$id'");
        
        $row_get_invoice = mysqli_fetch_assoc($get_invoice_date);
        
        $pet_owner_id = $row_get_invoice['pet_owner_id'];
        
        print_r(json_encode(get_result($conn,$pet_owner_id, 'user')));
        
        
    }
    

    
    


?>