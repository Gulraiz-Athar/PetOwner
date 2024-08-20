<?php
include("../../services/database.php");

if(isset($_POST['deliveryid'])){
    $deliveryid = $_POST['deliveryid'];
    $status = $_POST['status'];
    $paid = $_POST['paid'];
    $id = $_POST['id'];

    $query = mysqli_query($conn,"UPDATE `deliveries` SET `delivery_id`='$deliveryid',`status`='$status',`paid`='$paid' WHERE `id`='$id'");
    
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}
?>
