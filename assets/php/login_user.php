<?php
include("../../services/database.php");

session_start();




if(isset($_REQUEST['email'])){
    $password = md5($_REQUEST['password']);
    $email = $_REQUEST['email'];

    $user = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' AND password='$password' AND `is_enable` = '1'");
    if(mysqli_num_rows($user)){
        
         $_SESSION['login_users']  = mysqli_fetch_assoc($user);
      $_SESSION['material_user'] =  true;
      echo "verified";
    }else{
        
        echo "not verified";
        
    }
   

}else{
    echo '0';
}


?>