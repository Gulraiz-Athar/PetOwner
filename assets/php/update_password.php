<?php session_start();
include("../../services/database.php");

$password = md5($_POST['password']);
$user_id = $_POST['user_id'];

$update_pass = mysqli_query($conn, "UPDATE `user` SET `password` = '$password' WHERE `id` = '$user_id'");

$delete_token = mysqli_query($conn, "DELETE FROM `forget_password` WHERE `user_id` = '$user_id'");

echo "ok" ;       

?>
