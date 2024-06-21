<?php

function signUp($username,$email,$password){
    $conn = mysqli_connect("localhost","root","","project");
    mysqli_query($conn,"INSERT INTO `user` (`name`,`email`,`password`) VALUES('$username','$email','$password')");
    $result = mysqli_affected_rows($conn);
    if($result == 1){
        return true;
    }else{
        return false;
    }

}

function login($email,$password){
    $conn = mysqli_connect("localhost","root","","project");
    $sql = mysqli_query($conn,"SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
    $result = mysqli_fetch_assoc($sql); 
    return $result;
}

function hashPassword($password){
    return sha1($password);
}

function Alldata(){
    $conn = mysqli_connect("localhost","root","","project");
    $sql = mysqli_query($conn,"SELECT `id`,`name`,`email` FROM `user`");
    $data = [];
    while($result = mysqli_fetch_assoc($sql)){
        $data[] = $result;
    }
    
    return $data;
}

function userRole(){
    return $_SESSION['user']['user-role'];
}


function deleteUser($id){
    $conn = mysqli_connect("localhost","root","","project");
    mysqli_query($conn,"DELETE FROM `user` WHERE `id` = '$id'");
    $result = mysqli_affected_rows($conn);
    if($result == 1){
        return true;
    }else{
        return false;
    }

}

function getUserById($id){
    $conn = mysqli_connect("localhost","root","","project");
    $sql = mysqli_query($conn,"SELECT `id`,`name`,`email` FROM `user` WHERE `id` = '$id'");
    $result = mysqli_fetch_assoc($sql);
    return $result;
}


function updateUser($id,$username,$email,$password){
    $conn = mysqli_connect("localhost","root","","project");
    $sql = "UPDATE `user` SET";
    if(!empty($username)){
        $sql .= "`name` = '$username'";
    }
    if(!empty($email)){
        $sql .= ",`email` = '$email'";
    }
    if(!empty($password)){
        $newpass = hashPassword($password);
        $sql .= ",`password` = '$newpass'";
    }
    $sql .= "WHERE `id` = '$id' ";

    // echo $sql;die;
    mysqli_query($conn,$sql);


    $result = mysqli_affected_rows($conn);
    if($result == 1){
        return true;
    }else{
        return false;
    }

}