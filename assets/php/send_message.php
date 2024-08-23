<?php
session_start();
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
include('config.php');


    if($_POST['flag'] == "forget_form"){
        $token = rand();
        $token = md5($token);
        $user_email = $_POST['your-email'];
        $getid = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$user_email'");
        if(mysqli_num_rows($getid)){
            $rowid = mysqli_fetch_assoc($getid);
            $user_id = $rowid['id'];
            $add_token = mysqli_query($conn, "INSERT INTO `token`(`user_id`, `token`) VALUES ('$user_id','$token')");
            
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
            $mail->setfrom('gulraizathar87@gmail.com', 'Teracassa');
            $mail->addAddress($user_email);
            // $mail->addaddress('info@topwaterservices.com');
            $mail->isHTML(true);                                  // Set email format to HTML
        
            $mail->Subject ="Contact Email (Terracassa )";
        
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
            <div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">If you are unable to see this message, <a href="#" style="color: #A5A5A5; text-decoration: underline;">click here to view in browser</a></div>
            <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        
                <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
                    <h1 style="margin-top: 0px;">'.$name.'</h1>
                    <div style="color: #636363; font-size: 14px;">
                        <p>Thanks For Contacting Us. Dont Worry About your password.. You can setup a new password by clicking on button below</p>
                    </div>
                    <a href="http://terracassa.com/confirm_password.php?token='.$token.'" style="padding: 8px 20px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 20px 0px; margin-right: 20px; text-decoration: none;">Reset Password</a>
                    <h4 style="margin-bottom: 10px;">Need Help?</h4>
                    <div style="color: #A5A5A5; font-size: 12px;">
                        <p>If you have any questions you can simply reply to this email or find our contact information below. Also contact us at <a href="#" style="text-decoration: underline; color: #4B72FA;">info@terracassa.com</a></p>
                    </div>
                </div>
                <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        
        
                    <div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">Terracassa</div>
        
                </div>
            </div>
            </body>
            </html>';
              $mail->Body = $msg_body;
              if($mail->send()) {
              echo 'success';
              } else {
                //   echo 'failed';
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
          }
        }else{
            header('location:../forget_password.php?result=500');
        }
        
        
        
        
        
        
        
        
          
       
     

        
        
    // }

//     if(isset($_POST)){

//       $email = $_POST['your-email'];
//       $name = $_POST['your-name'];
//       $phone = $_POST['phone'];
//       $subject = $_POST['your-subject'];
//       $message = $_POST['your-message'];          

//       $verification_temp ="";

//       $mail = new phpmailer\PHPMailer\PHPMailer();
//       //$mail->SMTPDebug = 2;            // Enable verbose debug output
//       $mail->IsSMTP();                    // Set mailer to use SMTP
//       $mail->Host = 'mail.topwaterservices.com'; // cpanel url
//       $mail->SMTPAuth = true;                               // Enable SMTP authentication
//       $mail->Username   = 'info@topwaterservices.com';
//       $mail->Password   = '+1R#k{XR[0tZ';                         // SMTP password
//       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//       $mail->Port = 587;                                    // TCP port to connect to
//       $mail->setfrom('info@topwaterservices.com', 'Top-Water');
//       $mail->addAddress($user_email);
//       // $mail->addaddress('info@topwaterservices.com');
//       $mail->isHTML(true);                                  // Set email format to HTML
  
//       $mail->Subject ="Contact Email (Top Water )";
  
//       // Email Template
      
//       $msg_body = '<!DOCTYPE html>
//       <html>
//       <head>
//       </head>
//       <body style="background-color:#fff; padding: 20px; font-size: 14px; line-height: 1.5; font-family:Helvetica Neue,Segoe UI, Helvetica, Arial, sans-serif;">
//       <div style="max-width: 600px; margin: 0px auto; ">
//           <div style="max-width: 600px; margin: 0px auto; ">
//           <div style="background-color:#53DDF4;height:70px;color:white;">
//           <h2 style="line-height: 350%;margin-left:220px;color:white;"> Contact EMail </h2>
//           </div>
//               <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
//               <div style="color: gray;">
//                      Name : '.$name.'<br>
//                      Email : '.$email.'<br>
//                      Phone : '.$phone.'<br>
//                      Subject : '.$subject.'<br>
//                      Message : '.$message.'<br><br><br>
//                      Regards <br><br> <b style="color:#53DDF4">TERACASSA</b>    
//                   </div>
//               </div>
//                 <div style="color:gray;"></div>
//           </div>
//       </body>
//       </html>';
//       $mail->Body = $msg_body;
//       if($mail->send()) {
//       return 'success';
//       } else {
//           return 'failed';
//       }
//   }



//     if(isset($_POST)){

//       $email = $_POST['your-email'];
//       $name = $_POST['your-name'];
//       $phone = $_POST['phone'];
//       $subject = $_POST['your-subject'];
//       $message = $_POST['your-message'];          

//       $verification_temp ="";

//       $mail = new phpmailer\PHPMailer\PHPMailer();
//       //$mail->SMTPDebug = 2;            // Enable verbose debug output
//       $mail->IsSMTP();                    // Set mailer to use SMTP
//       $mail->Host = 'mail.topwaterservices.com'; // cpanel url
//       $mail->SMTPAuth = true;                               // Enable SMTP authentication
//       $mail->Username   = 'info@topwaterservices.com';
//       $mail->Password   = '+1R#k{XR[0tZ';                         // SMTP password
//       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//       $mail->Port = 587;                                    // TCP port to connect to
//       $mail->setfrom('info@topwaterservices.com', 'Top-Water');
//       $mail->addAddress($user_email);
//       // $mail->addaddress('info@topwaterservices.com');
//       $mail->isHTML(true);                                  // Set email format to HTML
  
//       $mail->Subject ="Contact Email (Top Water )";
  
//       // Email Template
      
//       $msg_body = '<!DOCTYPE html>
//       <html>
//       <head>
//       </head>
//       <body style="background-color:#fff; padding: 20px; font-size: 14px; line-height: 1.5; font-family:Helvetica Neue,Segoe UI, Helvetica, Arial, sans-serif;">
//       <div style="max-width: 600px; margin: 0px auto; ">
//           <div style="max-width: 600px; margin: 0px auto; ">
//           <div style="background-color:#53DDF4;height:70px;color:white;">
//           <h2 style="line-height: 350%;margin-left:220px;color:white;"> Contact EMail </h2>
//           </div>
//               <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
//               <div style="color: gray;">
//                      Name : '.$name.'<br>
//                      Email : '.$email.'<br>
//                      Phone : '.$phone.'<br>
//                      Subject : '.$subject.'<br>
//                      Message : '.$message.'<br><br><br>
//                      Regards <br><br> <b style="color:#53DDF4">TERACASSA</b>    
//                   </div>
//               </div>
//                 <div style="color:gray;"></div>
//           </div>
//       </body>
//       </html>';
//       $mail->Body = $msg_body;
//       if($mail->send()) {
//       return 'success';
//       } else {
//           return 'failed';
//       }
//   }


?>
