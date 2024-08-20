<?php
include("../../services/database.php");

if(isset($_POST['email'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);
    if($role === 'petowner'){
        $checkpetuser = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `petowners` WHERE `email`='$email'"));
        if($checkpetuser == 0){
            mysqli_query($conn, "INSERT INTO `petowners`(`name`, `email`) VALUES ('$name','$email')");
        }
    }
    elseif($role === 'vetowner'){
        $checkvetuser = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `vetprofiles` WHERE `email`='$email'"));
        if($checkvetuser == 0){
            mysqli_query($conn, "INSERT INTO `vetprofiles`(`name`, `email`) VALUES ('$name','$email')");
        }
    }
    $query = mysqli_query($conn,"INSERT INTO `user`(`name`, `email`, `password`, `role`) VALUES ('$name ','$email','$password','$role')");
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}

?>