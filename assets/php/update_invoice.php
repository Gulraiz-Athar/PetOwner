<?php
include("../../services/database.php");

if(isset($_POST['invoiceno'])){
    $invoiceno = $_POST['invoiceno'];
    $veterinary_id = $_POST['veterinary_id'];
    $petowner_id = $_POST['petowner_id'];
    $vaterinary = $_POST['vaterinary'];
    $petowner = $_POST['petowner'];
    $id = $_POST['id'];

    $query = mysqli_query($conn,"UPDATE `invoices` SET `invoice_no`='$invoiceno',`veterinarian_id`='$veterinary_id',`paid_to_vet`='$petowner',`paid_to_del`='$vaterinary',`pet_owner_id`='$petowner_id',`status`='1' WHERE `id`='$id'");
    
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}
?>
