<?php
include("../../services/database.php");

if(isset($_POST['invoiceno'])){
    $invoiceno = $_POST['invoiceno'];
    $veterinary_id = $_POST['veterinary_id'];
    $petowner_id = $_POST['petowner_id'];
    $vaterinary = $_POST['vaterinary'];
    $petowner = $_POST['petowner'];
    $query = mysqli_query($conn,"INSERT INTO `invoices`(`invoice_no`, `veterinarian_id`, `pet_owner_id`, `status`, `paid_to_vet`, `paid_to_del`) VALUES ('$invoiceno','$veterinary_id','$petowner_id','1','$vaterinary','$petowner')");
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}

?>