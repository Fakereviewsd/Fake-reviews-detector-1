<?php
session_start();
if(!empty($_SESSION['user'])){
    header("LOCATION: index.html");
}
require "lib.php";

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashpass = hashPassword($password);

    $userdata = login($email,$hashpass);

    if(!empty($userdata)){
        $_SESSION['user'] = $userdata;
        header("LOCATION: index.html");
    }else{
        echo "invalid user and password";
    }

}




require "design/login.html";