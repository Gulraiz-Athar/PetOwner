<?php
include("../../services/database.php");


    $role = $_POST['role'];
    if($role == "veterinarian"){

        $name = $_POST['fullname'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $province = $_POST['province'];
        $postal_code = $_POST['postal_code'];
        $pharmacy_name = $_POST['pharmacy_name'];
        $pharmacy_code = $_POST['pharmacy_code'];
        $pharmacy_address = $_POST['pharmacy_address'];
        $role = $_POST['role'];
        
        $query = mysqli_query($conn,"INSERT INTO `user`(`name`, `email`, `password`, `role`) VALUES ('$name ','$email','$password','$role')");
        if($query){
            
            $last_id = mysqli_insert_id($conn);
            
            
        $query_userinfo = mysqli_query($conn,"INSERT INTO `user_info`(`user_id`, `country`, `city`, `province`, `postal_code`, `pharmacy_name`, `pharmacy_code`, `pharmacy_address`) VALUES ('$last_id','$country','$city','$province','$postal_code','$pharmacy_name','$pharmacy_code','$pharmacy_address')");
        if($query_userinfo){
            echo '1';
        }else{
            echo '0';
        }
        
        }
    
    
    
}else{
    
        $name = $_POST['fullname'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $province = $_POST['province'];
        $postal_code = $_POST['postal_code'];
        $pets_number = $_POST['pets_number'];
        $pet_species = $_POST['pet_species'];
        $address = $_POST['address'];
        
        
         $query = mysqli_query($conn,"INSERT INTO `user`(`name`, `email`, `password`, `role`) VALUES ('$name ','$email','$password','$role')");
        if($query){
            
            $last_id = mysqli_insert_id($conn);
            
            
            $query_userinfo = mysqli_query($conn,"INSERT INTO `user_info`(`user_id`, `country`, `city`, `province`, `postal_code`, `pets_number`, `pet_species`, `address`) VALUES ('$last_id','$country','$city','$province','$postal_code','$pets_number','$pet_species','$address')");
            if($query_userinfo){
                echo '1';
            }else{
                echo '0';
            }
        
        }
    
    
    
}


// if(isset($_POST['email'])){
//     $name = $_POST['fullname'];
//     $email = $_POST['email'];
//     $password = md5($_POST['password']);
//     $query = mysqli_query($conn,"INSERT INTO `user`(`name`, `email`, `password`, `role`) VALUES ('$name ','$email','$password','user')");
//     if($query){
//         echo '1';
//     }else{
//         echo '0';
//     }
// }

?>