<?php session_start();
 
// Include the configuration file 
include 'config.php'; 
include("../services/database.php");
include '../assets/php/PHPMailer/PHPMailer.php';
include '../assets/php/PHPMailer/SMTP.php';
include '../assets/php/PHPMailer/Exception.php';
include 'db_connect.php'; 
include 'stripe-php/init.php'; 
 
// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
 
// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 

if($jsonObj->request_type == 'create_payment_intent'){ 
     
    $price = $jsonObj->price;
    $price  = round($price*100);    
    $description = 'Televet';
    $currency = 'USD';
    // Set content type to JSON 
    header('Content-Type: application/json'); 
     
    try { 
        // Create PaymentIntent with amount and currency 
        $paymentIntent = \Stripe\PaymentIntent::create([ 
            'amount' => $price, 
            'currency' => $currency, 
            'description' => 'Televet', 
            'payment_method_types' => [ 
                'card' 
            ] 
        ]); 
     
        $output = [ 
            'id' => $paymentIntent->id, 
            'clientSecret' => $paymentIntent->client_secret 
        ]; 
     
        echo json_encode($output); 
    } catch (Error $e) { 
        http_response_code(500); 
        echo json_encode(['error' => $e->getMessage()]); 
    } 
}elseif($jsonObj->request_type == 'create_customer'){ 
    $payment_intent_id = !empty($jsonObj->payment_intent_id)?$jsonObj->payment_intent_id:''; 
    $name = !empty($jsonObj->name)?$jsonObj->name:''; 
    $email = !empty($jsonObj->email)?$jsonObj->email:''; 
     
    // Add customer to stripe 
    try {   
        $customer = \Stripe\Customer::create(array(  
            'name' => $name,  
            'email' => $email 
        )); 

    }catch(Exception $e) {   
        $api_error = $e->getMessage();   
    } 
     
    if(empty($api_error) && $customer){ 
        try { 
            // Update PaymentIntent with the customer ID 
            $paymentIntent = \Stripe\PaymentIntent::update($payment_intent_id, [ 
                'customer' => $customer->id 
            ]); 
        } catch (Exception $e) {  
            // log or do what you want 
        } 
         
        $output = [ 
            'id' => $payment_intent_id, 
            'customer_id' => $customer->id 
        ]; 
        echo json_encode($output); 
    }else{ 
        http_response_code(500); 
        echo json_encode(['error' => $api_error]); 
    } 
}elseif($jsonObj->request_type == 'payment_insert'){ 
    $payment_intent = !empty($jsonObj->payment_intent)?$jsonObj->payment_intent:''; 
    $customer_id = !empty($jsonObj->customer_id)?$jsonObj->customer_id:''; 
    $invoice_id = $jsonObj->invoice_id;
     
    // Retrieve customer info 
    try {   
        $customer = \Stripe\Customer::retrieve($customer_id);  
    }catch(Exception $e) {   
        $api_error = $e->getMessage();   
    } 
     
    // Check whether the charge was successful 
    if(!empty($payment_intent) && $payment_intent->status == 'succeeded'){ 
        // Transaction details  
        $transaction_id = $payment_intent->id; 
        $paid_amount = $payment_intent->amount; 
        $paid_amount = ($paid_amount/100); 
        $paid_currency = $payment_intent->currency; 
        $payment_status = $payment_intent->status; 
         
        $customer_name = $customer_email = ''; 
        if(!empty($customer)){ 
            $customer_name = !empty($customer->name)?$customer->name:''; 
            $customer_email = !empty($customer->email)?$customer->email:''; 
        } 
         
        // Check if any transaction data is exists already with the same TXN ID 
        $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?"; 
        $stmt = $db->prepare($sqlQ);  
        $stmt->bind_param("s", $transaction_id); 
        $stmt->execute(); 
        $stmt->bind_result($row_id); 
        $stmt->fetch(); 
         
        $payment_id = 0; 
        if(!empty($row_id)){ 
            $payment_id = $row_id; 
        }else{ 
            
            $get_invoice = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$invoice_id'");
            $row_invoice = mysqli_fetch_assoc($get_invoice);
            $paid_to_vet = $row_invoice['paid_to_vet'];
            $veterinarian_id = $row_invoice['veterinarian_id'];
            $pet_owner_id = $row_invoice['pet_owner_id'];
            
            $role = $_SESSION['login_users']['role'];

            if($role == "admin"){
                 $user_id = $pet_owner_id;
            }else{
                 $user_id = $_SESSION['login_users']['id'];
            }
            
            // // Insert transaction data into the database 
            $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,invoice_id,user_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())"; 
            $stmt = $db->prepare($sqlQ); 
            $stmt->bind_param("sssdsdsssss", $customer_name, $customer_email, $description, $price, $currency, $paid_amount, $paid_currency, $transaction_id, $payment_status,$invoice_id,$user_id); 
            $insert = $stmt->execute(); 
            
            if($insert){ 
                $payment_id = $stmt->insert_id; 
            } 
        } 
        
         $update_status = mysqli_query($conn, "UPDATE `invoices` SET `status` = '1' WHERE `id` = '$invoice_id'");
         
         $update_transaction = mysqli_query($conn, "UPDATE `transactions` SET `veterinarian_id` = '$veterinarian_id' WHERE `id` = '$payment_id'");
         
         if($update_status){

            $output = [ 
                'payment_txn_id' => base64_encode($transaction_id),
                'role' => $role,
                'status' => 1,
            ];

         }else{

            $output = [ 
                'payment_txn_id' => base64_encode($transaction_id),
                'role' => $role,
                'status' => 0,
            ];

         }
    
        echo json_encode($output); 
    }else{ 
        http_response_code(500); 
        echo json_encode(['error' => 'Transaction has been failed!']); 
    } 
} 
 
?>