

<?php 

include("../../services/database.php");
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$email = $_POST['email'];

$get_data = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");
$row_data = mysqli_fetch_assoc($get_data);
$id = $row_data['id'];

$token = substr(sha1(mt_rand()),17,6);

$insert_data = mysqli_query($conn, "INSERT INTO `forget_password`(`user_id`, `token`) VALUES ('$id','$token')");

$mail = new phpmailer\PHPMailer\PHPMailer();
$mail->SMTPDebug = 2;            // Enable verbose debug output
$mail->IsSMTP();                    // Set mailer to use SMTP
$mail->Host = $_ENV['MAIL_HOST']; // Specify main and backup SMTP servers
$mail->Port = $_ENV['MAIL_PORT']; // TCP port to connect to
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = $_ENV['MAIL_USERNAME']; // SMTP username
$mail->Password = $_ENV['MAIL_PASSWORD']; // SMTP password
$mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION']; // Enable TLS encryption, `ssl` also accepted       
$mail->setfrom($email, 'Televet');
$mail->addAddress($email, 'Televet');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject ="Invoice Email (Televet )";
              
$msg_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<!--[if (gte mso 9)|(IE)]>
  <xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
<meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
<meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS -->
<meta name="format-detection" content="address=no"> <!-- disable auto address linking in iOS -->
<meta name="format-detection" content="email=no"> <!-- disable auto email linking in iOS -->
<meta name="color-scheme" content="only">
<title></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style type="text/css">
/*Basics*/
body {margin:0px !important; padding:0px !important; display:block !important; min-width:100% !important; width:100% !important; -webkit-text-size-adjust:none;}
table {border-spacing:0; mso-table-lspace:0pt; mso-table-rspace:0pt;}
table td {border-collapse: collapse;mso-line-height-rule:exactly;}
td img {-ms-interpolation-mode:bicubic; width:auto; max-width:auto; height:auto; margin:auto; display:block!important; border:0px;}
td p {margin:0; padding:0;}
td div {margin:0; padding:0;}
td a {text-decoration:none; color: inherit;}
/*Outlook*/
.ExternalClass {width: 100%;}
.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {line-height:inherit;}
.ReadMsgBody {width:100%; background-color: #ffffff;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors] {color:inherit !important; text-decoration:none !important; font-size:inherit !important; font-family:inherit !important; font-weight:inherit !important; line-height:inherit !important;} 
/*Gmail blue links*/
u + #body a {color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit;}
/*Buttons fix*/
.undoreset a, .undoreset a:hover {text-decoration:none !important;}
.yshortcuts a {border-bottom:none !important;}
.ios-footer a {color:#aaaaaa !important;text-decoration:none;}
/* data-outer-table="800 - 600" */
.outer-table {width:640px!important;max-width:640px!important;}
/* data-inner-table="780 - 540" */
.inner-table {width:580px!important;max-width:580px!important;}
/*Responsive-Tablet*/
@media only screen and (max-width: 799px) and (min-width: 601px) {
  .outer-table.row {width:640px!important;max-width:640px!important;}
  .inner-table.row {width:580px!important;max-width:580px!important;}
}
/*Responsive-Mobile*/
@media only screen and (max-width: 600px) and (min-width: 320px) {
  table.row {width: 100%!important;max-width: 100%!important;}
  td.row {width: 100%!important;max-width: 100%!important;}
  .img-responsive img {width:100%!important;max-width: 100%!important;height: auto!important;margin: auto;}
  .center-float {float: none!important;margin:auto!important;}
  .center-text{text-align: center!important;}
  .container-padding {width: 100%!important;padding-left: 15px!important;padding-right: 15px!important;}
  .container-padding10 {width: 100%!important;padding-left: 10px!important;padding-right: 10px!important;}
  .hide-mobile {display: none!important;}
  .menu-container {text-align: center !important;}
  .autoheight {height: auto!important;}
  .m-padding-10 {margin: 10px 0!important;}
  .m-padding-15 {margin: 15px 0!important;}
  .m-padding-20 {margin: 20px 0!important;}
  .m-padding-30 {margin: 30px 0!important;}
  .m-padding-40 {margin: 40px 0!important;}
  .m-padding-50 {margin: 50px 0!important;}
  .m-padding-60 {margin: 60px 0!important;}
  .m-padding-top10 {margin: 30px 0 0 0!important;}
  .m-padding-top15 {margin: 15px 0 0 0!important;}
  .m-padding-top20 {margin: 20px 0 0 0!important;}
  .m-padding-top30 {margin: 30px 0 0 0!important;}
  .m-padding-top40 {margin: 40px 0 0 0!important;}
  .m-padding-top50 {margin: 50px 0 0 0!important;}
  .m-padding-top60 {margin: 60px 0 0 0!important;}
  .m-height10 {font-size:10px!important;line-height:10px!important;height:10px!important;}
  .m-height15 {font-size:15px!important;line-height:15px!important;height:15px!important;}
  .m-height20 {font-size:20px!important;line-height:20px!important;height:20px!important;}
  .m-height25 {font-size:25px!important;line-height:25px!important;height:25px!important;}
  .m-height30 {font-size:30px!important;line-height:30px!important;height:30px!important;}
  .radius6 {border-radius: 6px!important;}
  .fade-white {background-color: rgba(255, 255, 255, 0.8)!important;}
  .rwd-on-mobile {display: inline-block!important;padding: 5px!important;}
  .center-on-mobile {text-align: center!important;}
  .rwd-col {width:100%!important;max-width:100%!important;display:inline-block!important;}
}
</style>
<style type="text/css" class="export-delete"> 
  .composer--mobile table.row {width: 100%!important;max-width: 100%!important;}
  .composer--mobile td.row {width: 100%!important;max-width: 100%!important;}
  .composer--mobile .img-responsive img {width:100%!important;max-width: 100%!important;height: auto!important;margin: auto;}
  .composer--mobile .center-float {float: none!important;margin:auto!important;}
  .composer--mobile .center-text{text-align: center!important;}
  .composer--mobile .container-padding {width: 100%!important;padding-left: 15px!important;padding-right: 15px!important;}
  .composer--mobile .container-padding10 {width: 100%!important;padding-left: 10px!important;padding-right: 10px!important;}
  .composer--mobile .hide-mobile {display: none!important;}
  .composer--mobile .menu-container {text-align: center !important;}
  .composer--mobile .autoheight {height: auto!important;}
  .composer--mobile .m-padding-10 {margin: 10px 0!important;}
  .composer--mobile .m-padding-15 {margin: 15px 0!important;}
  .composer--mobile .m-padding-20 {margin: 20px 0!important;}
  .composer--mobile .m-padding-30 {margin: 30px 0!important;}
  .composer--mobile .m-padding-40 {margin: 40px 0!important;}
  .composer--mobile .m-padding-50 {margin: 50px 0!important;}
  .composer--mobile .m-padding-60 {margin: 60px 0!important;}
  .composer--mobile .m-padding-top10 {margin: 30px 0 0 0!important;}
  .composer--mobile .m-padding-top15 {margin: 15px 0 0 0!important;}
  .composer--mobile .m-padding-top20 {margin: 20px 0 0 0!important;}
  .composer--mobile .m-padding-top30 {margin: 30px 0 0 0!important;}
  .composer--mobile .m-padding-top40 {margin: 40px 0 0 0!important;}
  .composer--mobile .m-padding-top50 {margin: 50px 0 0 0!important;}
  .composer--mobile .m-padding-top60 {margin: 60px 0 0 0!important;}
  .composer--mobile .m-height10 {font-size:10px!important;line-height:10px!important;height:10px!important;}
  .composer--mobile .m-height15 {font-size:15px!important;line-height:15px!important;height:15px!important;}
  .composer--mobile .m-height20 {font-srobotoize:20px!important;line-height:20px!important;height:20px!important;}
  .composer--mobile .m-height25 {font-size:25px!important;line-height:25px!important;height:25px!important;}
  .composer--mobile .m-height30 {font-size:30px!important;line-height:30px!important;height:30px!important;}
  .composer--mobile .radius6 {border-radius: 6px!important;}
  .composer--mobile .fade-white {background-color: rgba(255, 255, 255, 0.8)!important;}
  .composer--mobile .rwd-on-mobile {display: inline-block!important;padding: 5px!important;}
  .composer--mobile .center-on-mobile {text-align: center!important;}
  .composer--mobile .rwd-col {width:100%!important;max-width:100%!important;display:inline-block!important;}
</style>
</head>

<body data-bgcolor="Body" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" bgcolor="#FFFFFF">

<span class="preheader-text" data-preheader-text style="color: transparent; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; visibility: hidden; width: 0; display: none; mso-hide: all;"></span>

<!-- Preheader white space hack -->
<div style="display: none; max-height: 0px; overflow: hidden;">
&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
</div>

<div data-primary-font="Barlow" data-secondary-font="Rubik" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></div>

<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;">
  <tr><!-- Outer Table -->
    <td align="center" data-bgcolor="Body" bgcolor="#FFFFFF" data-composer>


<table data-outer-table border="0" align="center" cellpadding="0" cellspacing="0" class="outer-table row" role="presentation" width="640" style="width:640px;max-width:640px;" data-module="blue-logo">
  <!-- blue-logo -->
  <tr>
    <td align="center" bgcolor="#FFFFFF" data-bgcolor="BgColor" class="container-padding">

<!-- Content -->
<table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;">
  <tr>
    <td height="20" style="font-size:20px;line-height:20px;" data-height="Spacing top">&nbsp;</td>
  </tr>
  <tr data-element="blue-logo" data-label="Logo">
    <td align="center" class="center-text">
      <!-- <img style="width:120px;border:0px;display: inline!important;" src="images/logo.png" width="120" border="0" editable="true" data-icon data-image-edit data-url data-label="Logo" data-image-width alt="logo"> -->
    </td>
  </tr>
  <tr>
    <td height="20" style="font-size:20px;line-height:20px;" data-height="Spacing bottom">&nbsp;</td>
  </tr>
</table>
<!-- Content -->

    </td>
  </tr>
  <!-- blue-logo -->
</table>

<table data-outer-table border="0" align="center" cellpadding="0" cellspacing="0" class="outer-table row" width="640" style="width:640px;max-width:640px;" data-module="blue-header">
  <!-- blue-header -->
  <tr>
    <td align="center" class="img-responsive container-padding">
      <img class="auto-width" style="display:block;width:100%;max-width:100%;border:0px;" data-image-edit data-url data-label="Header image" width="640" src="../images/forget_pass.jpeg" border="0" editable="true" alt="picture">
    </td>
  </tr>
  <!-- blue-header -->
</table>

<table data-outer-table border="0" align="center" cellpadding="0" cellspacing="0" class="outer-table row" role="presentation" width="640" style="width:640px;max-width:640px;" data-module="blue-preface-4">
  <!-- blue-preface-4 -->
  <tr>
    <td align="center" bgcolor="#FFFFFF" data-bgcolor="BgColor" class="container-padding">

<table data-inner-table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" class="inner-table row" width="580" style="width:580px;max-width:580px;">
  <tr>
    <td height="40" style="font-size:40px;line-height:40px;" data-height="Spacing top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" data-bgcolor="BgColor" bgcolor="#FFFFFF">
      <!-- content -->
      <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;">
        <tr data-element="blue-subline" data-label="Sublines">
          <td class="center-text" data-text-style="Sublines" align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:24px;font-weight:900;font-style:normal;color:#50C0FF;text-decoration:none;letter-spacing:1px;">
              <singleline>
                <div mc:edit data-text-edit>
                  DONT WORRY, WE ALWAYS FORGET THINGS
                </div>
              </singleline>
          </td>
        </tr>
        <tr data-element="blue-headline" data-label="Headlines">
          <td class="center-text" data-text-style="Headlines" align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:48px;line-height:54px;font-weight:900;font-style:normal;color:#222222;text-decoration:none;letter-spacing:0px;">
              <singleline>
                <div mc:edit data-text-edit>
                  LETS CREATE A NEW PASSWORD
                </div>
              </singleline>
          </td>
        </tr>
        <tr data-element="blue-headline" data-label="Headlines">
          <td height="15" style="font-size:15px;line-height:15px;" data-height="Spacing under headline">&nbsp;</td>
        </tr>
        <tr data-element="blue-paragraph" data-label="Paragraphs">
          <td class="center-text" data-text-style="Paragraphs" align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;font-weight:400;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
              <singleline>
                <div mc:edit data-text-edit>
                  
                </div>
              </singleline>
          </td>
        </tr>
        <tr data-element="blue-header-paragraph" data-label="Paragraphs">
          <td height="25" style="font-size:25px;line-height:25px;" data-height="Spacing under paragraph">&nbsp;</td>
        </tr>
        <tr data-element="blue-button" data-label="Buttons">
          <td align="center">
            <!-- Button -->
            <table border="0" cellspacing="0" cellpadding="0" role="presentation" align="center" class="center-float">
              <tr>
                <td align="center" data-border-radius-default="0,6,36" data-border-radius-custom="Buttons" data-bgcolor="Buttons" bgcolor="#0387EC" style="border-radius: 0px;">
            <!--[if (gte mso 9)|(IE)]>
              <table border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                  <td align="center" width="35"></td>
                  <td align="center" height="50" style="height:50px;">
                  <![endif]-->
                    <singleline>
                      <a href="http://localhost/televet_server/forget_password.php?token='.$token.'" mc:edit data-button data-text-style="Buttons" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:20px;font-weight:700;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;padding: 15px 35px 15px 35px;display: inline-block;"><span>RESET PASSWORD</span></a>
                    </singleline>
                  <!--[if (gte mso 9)|(IE)]>
                  </td>
                  <td align="center" width="35"></td>
                </tr>
              </table>
            <![endif]-->
                </td>
              </tr>
            </table>
            <!-- Buttons -->
          </td>
        </tr>
      </table>
      <!-- content -->
    </td>
  </tr>
  <tr>
    <td height="40" style="font-size:40px;line-height:40px;" data-height="Spacing bottom">&nbsp;</td>
  </tr>
</table>

    </td>
  </tr>
  <!-- blue-preface-4 -->
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;" data-module="blue-footer">
  <!-- blue-footer -->
  <tr>
    <td align="center" bgcolor="#F8F8F8" data-bgcolor="BgColor" data-border-color="Footer Border Color" class="container-padding" style="border-top: 10px solid #F1F1F1;">
      


    </td>
  </tr>
  <!-- blue-footer -->
</table>

    </td>
  </tr><!-- Outer-Table -->
</table>

</body>
</html>';
$mail->Body = $msg_body;
if($mail->send()) {
    echo "ok";
} else {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            
            
?>