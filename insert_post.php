<?php
session_start();
// if(!isset($_SESSION['username'])){
//     header("Location: http://localhost/api_ajax/index.html");
// }
include "apis/conn.php";

    $username = $_SESSION['username'];
    $user_profile_image = "icons/user.png";
    

if(isset($_POST['submit']))
{
$files=$_FILES['file'];
$title=$_POST['title'];


$filename = $files['name'];
$fileerror = $files['error'];
$filetemp = $files['tmp_name']; 
$filetext = explode('.',$filename); 
$filecheck = strtolower(end($filetext));

$fileExt = array('png','jpg','jpeg');

if(in_array($filecheck,$fileExt))
{
    $destination = 'upload/'.$filename;
    move_uploaded_file($filetemp,$destination);

# FOR INSERTING DATA................
$insertquery="INSERT INTO posts (username, user_profile_img, post_img, post_des, likes) values('$username', '$user_profile_image', '$destination','$title', 5)";

 $result= mysqli_query($conn,$insertquery);     //  in db aur localhost server username password and database is present 

 if($result){
     header("Location:home.php");
 }

}
else{
    ?>
<script>
    alert("Error in Image. Please try again or Kindly check your Image Extension");
</script>
<?php
}
}

?>