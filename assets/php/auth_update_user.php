<?php
include("../../services/database.php");
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if(isset($_POST['email'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $is_enable = $_POST['is_enable'];
    $id = $_POST['id'];
    
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
    
    $query = mysqli_query($conn,"UPDATE `user` SET `name`='$name',`email`='$email',`role`='$role', `is_enable` = '$is_enable' WHERE `id`='$id'");
    
    if($is_enable == 1){
     $verification_temp ="";
              $mail = new phpmailer\PHPMailer\PHPMailer();
              $mail->SMTPDebug = 2;            // Enable verbose debug output
              $mail->IsSMTP();                    // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com'; // cpanel url
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username   = 'testingtech789@gmail.com';
              $mail->Password   = 'utvntcrsjxhfphfh';                         // SMTP password
              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 587;                                    // TCP port to connect to
              $mail->setfrom('gulraizathar87@gmail.com', 'Telvet');
              $mail->addAddress('gulraizathar87@gmail.com');
              // $mail->addaddress('info@topwaterservices.com');
              $mail->isHTML(true);                                  // Set email format to HTML
          
              $mail->Subject ="Contact Email (Televet)";
          
              // Email Template
              
              $msg_body = '<!DOCTYPE html>
            <html>
            <head>
            <style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
        
            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }
        
            tr:nth-child(even) {
              background-color: #dddddd;
            }
            </style>
            </head>
            <body style="background-color: #222533; padding: 20px; font-size: 14px; line-height: 1.43; font-family:Helvetica Neue,Segoe UI, Helvetica, Arial, sans-serif;">
            <!-- <div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">If you are unable to see this message, <a href="#" style="color: #A5A5A5; text-decoration: underline;">click here to view in browser</a></div> -->
            <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        
                <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
                    <img src="http://televet.spiderhuntstechnologies.com/assets/images/mario_logo.png" style="margin-left:34%;width:130px;">
                    <div style="color: #636363; font-size: 14px;">
                        <h3 style="text-align:center;">THANKS FOR JOINING US</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.

                        </p>
                    </div>
                    <a href="http://televet.spiderhuntstechnologies.com/auth-login.php" style="padding: 8px 20px; background-color: #47B8C7; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 20px 0px; margin-right: 20px; text-decoration: none;margin-left:34%;">Login Now</a>
                    <!-- <h4 style="margin-bottom: 10px;">Need Help?</h4>
                    <div style="color: #A5A5A5; font-size: 12px;">
                        <p>If you have any questions you can simply reply to this email or find our contact information below. Also contact us at <a href="#" style="text-decoration: underline; color: #4B72FA;">info@terracassa.com</a></p>
                    </div> -->
                </div>
                <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        
        
                    <!-- <div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">Terracassa</div> -->
        
                </div>
            </div>
            </body>
            </html>';
              $mail->Body = $msg_body;
              if($mail->send()) {
                // echo 'success';
              } else {
                //   echo 'failed';
                //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
    
    
    }
    
    
    if($query){
        echo '1';
    }else{
        echo '0';
    }
}
?>
