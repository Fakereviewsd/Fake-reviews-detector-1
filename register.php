<?php
session_start();
if(!empty($_SESSION['user'])){
    header("LOCATION: index.html");
}
require "lib.php";

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashpass = hashPassword($password);

        signUp($username,$email,$hashpass);

    }


include "design/register.html";


