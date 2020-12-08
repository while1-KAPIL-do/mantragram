<?php
include("conn.php");

    $e_mail = $_POST['email'];
    $full_name = $_POST['fullname'];
    $user_name = $_POST['username'];
    $pass_word = $_POST['password'];

    $q = "INSERT INTO user_info(`email`,`fullname`,`username`,`password`) VALUES ('$e_mail','$full_name','$user_name','$pass_word') ";
    $response = mysqli_query($conn,$q);

    if($response){
        echo "Signup Successfull !";
        header("Location: http://localhost/api_ajax/home.php");
        exit();
    }else{
        echo "Connection error... Try Again!";
        exit();
    }



?>