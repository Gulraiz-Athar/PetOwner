<?php
include("../../services/database.php");

if($_POST['flag'] == "petowner_data"){
    
    $user_id = $_POST['id'];
    
    $petowners = mysqli_query($conn, "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'");
    print_r(json_encode(mysqli_fetch_assoc($petowners)));
    
}



?>