<?php
include("../../services/database.php");
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($conn,"DELETE FROM deliveries WHERE `deliveries`.`id` = '$id'");
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}

?>