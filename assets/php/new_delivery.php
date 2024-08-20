<?php  session_start();
include("../../services/database.php");

         $invoice_id = $_POST['invoice_no'];
        $pet_owner = $_POST['pet_owner'];
        $pickupaddress = $_POST['pickupaddress'];
        $dropoffaddress = $_POST['dropoffaddress'];
        $weight = $_POST['weight'];
        
       
        
        $insert_delivery = mysqli_query($conn, "INSERT INTO `deliveries`( `invoice_id`, `pet_owner`, `pickupaddress`, `dropoffaddress`, `weight`) VALUES ('$invoice_id','$pet_owner','$pickupaddress','$dropoffaddress','$weight')");
   

    $get_invoice = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$invoice_id'");
    $row_get_invoice = mysqli_fetch_assoc($get_invoice);
    $pet_id = $row_get_invoice['pet_owner_id'];
    $units = $row_get_invoice['units'];
    $amount = $row_get_invoice['paid_to_vet'];

    
    $get_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$pet_id'");
    $row_get_user = mysqli_fetch_assoc($get_user);
    $name = $row_get_user['name'];
    $email = $row_get_user['email'];
    
    $get_user_info = mysqli_query($conn, "SELECT * FROM `user_info` WHERE `user_id` = '$pet_id'");
    $row_get_user_info = mysqli_fetch_assoc($get_user_info);
    
    $country = $row_get_user_info['country'];
    $city = $row_get_user_info['city'];
    $province = $row_get_user_info['province'];
    $postal_code = $row_get_user_info['postal_code'];
    $address = $row_get_user_info['address'];
    
    
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.wyngit.com/api/v1/orders/create?api_key=210511497528261495a6869d06439dc93d9220da5b129572e68f1ad1f3fbf8dc');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"my_order_number":"'.$invoice_no.'","delivery_address":{"firstname":"'.$name.'","lastname":"ac","address1":"'.$address.'","statecode":"BC","postalcode":"V3C0X0","city":"'.$city.'","countrycode":"CA","email":"'.$email.'"},"items":{"unique_product_id_1":{"title":"Product name 1","sku":"SKU","weight":2.5,"quantity":2}},"packages_measurement":"inch","packages":[{"identifier":"Package identifier 1","length":5.2,"width":4.2,"height":6.6,"weight":2.5,"quantity":2}]}');

$response = curl_exec($ch);


$wyngit_id = json_decode($response, true)['wyngit_id'];

$update_invoice = mysqli_query($conn, "UPDATE `invoices` SET `wyngit_id` = '$wyngit_id' WHERE `id` = '$invoice_id'");
$update_invoices = mysqli_query($conn, "UPDATE `invoices` SET `status` = '3' WHERE `id` = '$invoice_id'");


print_r($response);

curl_close($ch);

    
    


?>

?>