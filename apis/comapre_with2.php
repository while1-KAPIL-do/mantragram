<?php
include("conn.php");

$_data = $_POST['data'];
$colmn_name = $_POST['comp_with'];
$colmn_name2 = $_POST['comp_with2'];


$q = "SELECT $colmn_name,$colmn_name2 from user_info";
$result = mysqli_query($conn,$q);


$json_array = array();
while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
// echo json_encode($json_array);


$flag = "false";
for($i=0; $i<sizeof($json_array); $i++){
    if(strcmp($json_array[$i][$colmn_name], $_data)==0 || strcmp($json_array[$i][$colmn_name2], $_data)==0){
        $flag = "true";
    }
}

echo $flag;


// closing connection
mysqli_close($conn);

?>