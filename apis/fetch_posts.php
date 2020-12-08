<?php
include("conn.php");

$user_type = $_POST['user_type'];

if(strcmp($user_type, "all")==0){
    $q = "SELECT * from posts";
}else{
    $q = "SELECT * from posts WHERE `username`='$user_type';";
}

$result = mysqli_query($conn,$q);

$json_array = array();
while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
echo json_encode($json_array);

// $flag = "false";
// for($i=0; $i<sizeof($json_array); $i++){
//     echo $json_array[$i]["username"] . "<br>";
//     echo $json_array[$i]["user_profile_img"] . "<br>";
//     echo $json_array[$i]["post_img"] . "<br>";
//     echo $json_array[$i]["post_time"] . "<br>";
//     echo $json_array[$i]["likes"] . "<br>";
//     echo $json_array[$i]["post_des"] . "<br><br>";
// }
// print_r($json_array);
// echo $json_array;
// closing connection
mysqli_close($conn);

?>