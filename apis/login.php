<?php
session_start();

include("conn.php");

$id = $_POST['login_email'];
$ps = $_POST['login_pass'];

$q = "SELECT `email`,`username`,`password` from user_info WHERE (`username`='$id' || `email`='$id') && `password`='$ps';";
$result = mysqli_query($conn,$q);

$num = mysqli_num_rows($result);
if($num == 1){
        $_SESSION['username'] = $id;
        echo "Signup Successfull !";
        header("Location: http://localhost/api_ajax/home.php");
        exit();
}else{
        //
        // $_SESSION["Login_Error"] = 'Invalid credentials';
        // echo "Password incorrect... Try Again!";
        // exit();
        die(header("Location: http://localhost/api_ajax/index.php?loginFailed=true&reason=password"));
}

// closing connection
mysqli_close($conn);

?>