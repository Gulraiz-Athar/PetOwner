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
    
      header("location:../../admin_profile.php");
    
}else{

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $delivery_fee = $_POST['delivery_fee'];

    $percentage = $_POST['percentage'];
    $id = $_SESSION['login_users']['id'];

    $user_det = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$id'");
    $row_user_det = mysqli_fetch_assoc($user_det);
    $db_pass = $row_user_det['password'];  
    
    if($db_pass == $password){
        
        $update_user = mysqli_query($conn, "UPDATE `user` SET `name` = '$name' , `phone` = '$phone', `percentage` = '$percentage', `delivery_fee` = '$delivery_fee' WHERE `id` = '$id'");
       
    }else{
        
        $password = md5($_POST['password']);
        
        $update_user = mysqli_query($conn, "UPDATE `user` SET `password` = '$password', `name` = '$name', `phone` = '$phone' , `percentage` = '$percentage', `delivery_fee` = '$delivery_fee' WHERE `id` = '$id'");
        
    }
    
    header("location:../../admin_profile.php");
}   

?>
