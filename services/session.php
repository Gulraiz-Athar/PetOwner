<?php
// Initialize the session

session_start();

function checkAuth($email, $password, $conn)
{
    $password = md5($password);
    echo $password;
    $user = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($user)){
        return mysqli_fetch_assoc($user);
    }
    return null;
}

function setSesstion()
{
    $_SESSION["material_user"] = true;
}

function logoutSesstion()
{
    $_SESSION["material_user"] = false;
}

