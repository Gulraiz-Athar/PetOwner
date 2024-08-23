<?php session_start();
include("../../services/database.php");

if($_POST['flag'] == "update_image"){

    if(empty($_FILES['image']['size'])){
        
    }else{
        
        $id = $_SESSION['login_users']['id'];
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../images/" . $filename;
        
        move_uploaded_file($tempname, $folder);
        
        $update_image = mysqli_query($conn, "UPDATE `user` SET `image` = '$filename' WHERE `id` = '$id'");
    }
    
      header("location:../../pet_profile.php");
}else{

    $name = $_POST['name'];
    $pets_number = $_POST['pets_number'];
    $pet_species = $_POST['pet_species'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    
    $id = $_SESSION['login_users']['id'];

    $user_det = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$id'");
    $row_user_det = mysqli_fetch_assoc($user_det);
    $db_pass = $row_user_det['password'];

    if($db_pass == $password){
          
        $update_user = mysqli_query($conn, "UPDATE `user` SET `name` = '$name', `phone` = '$phone' WHERE `id` = '$id'");
        $update_user_info = mysqli_query($conn, "UPDATE `user_info` SET `city` = '$city', `province` = '$province', `postal_code` = '$postal_code', `country` = '$country' ,`pets_number` = '$pets_number', `pet_species` = '$pet_species', `address` = '$address' WHERE `user_id` = '$id'");
        
    }else{
        
        $password = md5($_POST['password']);
         $update_user = mysqli_query($conn, "UPDATE `user` SET `password` = '$password',  `phone` = '$phone', `name` = '$name' WHERE `id` = '$id'");
        $update_user_info = mysqli_query($conn, "UPDATE `user_info` SET `city` = '$city', `province` = '$province', `postal_code` = '$postal_code', `country` = '$country' , `pets_number` = '$pets_number', `pet_species` = '$pet_species', `address` = '$address' WHERE `user_id` = '$id'");
        
    }
    
    header("location:../../pet_profile.php");
}   

?>
