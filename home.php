<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: http://localhost/api_ajax/index.html");
}
$userID = $_SESSION['username']; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- custom style -->
    <link rel="stylesheet" href="http://localhost/api_ajax/styles/home.css" >


    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <!-- font family -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>



    <div>
        <div class="nav">
            <div class=nav-div1>
                <p>Mantragram</p>
            </div>
            <div class=nav-div2>
                <input type="text" placeholder="search">
            </div>
            <div class=nav-div3>
                <span><a href="http://localhost/api_ajax/home.php"><img src="icons/home.png" width="25px"></a></span>
                <span><a><img src="icons/share.png" width="25px"></a></span>
                <span><a><img src="icons/unlike.png" width="25px"></a></span>
                <span><a><img src="icons/user.png" width="25px"></a></span>
                <span><a href="http://localhost/api_ajax/apis/logout.php"><img src="icons/logout.png" width="25px"></a></span>
            </div>
        </div>

        <div class="body">

        <!-- kkkkk -->
            <div class="post-view">
                <div class="well window">
                    <div class="slider-frame-wrapper">    
                            <ul class="slider-frame">
                                <li class="parent-card slider-panel">
                                    <!-- <div>Overline</div>
                                    <h2><a href="#" alt="alt text">Headline text here</a></h2> -->

                                    <!-- <div class="card">
                                        <div class="card-head">
                                            <img src="b.jpg">
                                            <span id="post-username" >Soumya Agrawal</span>
                                        </div>
                                        <img class="card-img" src="b.jpg">
                                        
                                        <div class="card-time">6 nov 2020</div>

                                        <div class="card-footer">
                                            <img id="btn_like" src="icons/unlike.png" width="25px">
                                            <img id="btn_comment" src="icons/msg.png" width="25px">
                                            <img id="btn_share" src="icons/share.png" width="25px">
                                        </div>

                                        <div class="card-likes">2300 likes</div>

                                        <div class="card-footer-2">
                                            <div class="user-data">
                                                <div class="user-name">Soumya Agrawal</div>
                                                <div class="user-des">I love nature.</div>
                                            </div>
                                        </div>

                                    </div> -->

                                    <!-- <div class="card">
                                        <div class="card-head">
                                            <img src="b.jpg">
                                            <span>Kapil Agrawal</span>
                                        </div>
                                        <img class="card-img" src="b.jpg">
                                        <div class="card-footer">
                                            <img src="icons/like.png" width="25px">
                                            <img src="icons/msg.png" width="25px">
                                            <img src="icons/share.png" width="25px">
                                        </div>    
                                    </div> -->


                                </li><br>				                           
                        </ul><!-- .slider-window-frame -->
                    </div><!-- .slider-window-frame-wrapper -->
                </div><!-- .well .window -->
                <!-- =End Slider Module= -->
            </div><!-- post-view -->
            <!-- /kkkkk -->

            <div class="posts-upload">
                <form method="POST" action="insert_post.php" enctype="multipart/form-data">
                    <div class="image">
                        <label for="file-input">
                            <img src="icons/add1.webp" width="75px" height="75px" title="Add Image" id="pImg" />
                        </label>
                        <input id="file-input" type="file" name="file" onchange="readURL(this);"/>
                    </div>

                    <input type="text" name="title" id="title" placeholder="Add your Image title">
                    <input type="submit" value="Add Post" name="submit" class="form1" id="submit">
                </form>
            </div>
        </div>
    </div>
<?php

?>
        </div>    
    </div>
 <!-- custom script -->
 <script src="script/myImg.js"></script>
 <script>

var userID = "<?php echo $userID; ?>";

console.log("hello"+userID);

$(document).ready(function(){

    connectToserver();

    // $btn_like = $("#btn_like");
    // $btn_like.on("click", function(){
    //     if($btn_like.attr("src")=="icons/like.png"){
    //         $btn_like.attr("src","icons/unlike.png");
    //     }else if($btn_like.attr("src")=="icons/unlike.png"){
    //         $btn_like.attr("src","icons/like.png");
    //     }
    //     console.log("clicked  !"+$btn_like.attr("src"));
    // });

    function addCard(post_id,p_username_profile_img_url,p_username,p_post_img_url,p_post_time,p_post_des,p_post_likes) {
        $str = `
        <div class='card'>
            <div class='card-head'>
                <img src='${p_username_profile_img_url}'>
                <span id='post-username'>${p_username}</span>
            </div>
            <img class='card-img' src='${p_post_img_url}'>
            <div class='card-time'>${p_post_time}</div>
            <div class='card-footer'>
                <img id="btn_like_${post_id}" onclick="like_btn_clicked('${post_id}','${userID}')" src='icons/unlike.png' width='25px'>
                <img id='btn_comment' src='icons/msg.png' width='25px'>
                <img id='btn_share' src='icons/share.png' width='25px'>
            </div>
            <div class='card-likes'>${p_post_likes} likes</div>
            <div class='card-footer-2'>
                <div class='user-data'>
                    <div class='user-name'>${p_username}</div>
                    <div class='user-des'>${p_post_des}</div>
                </div>
            </div>
        </div>
    `;
        $(".parent-card").prepend($str);

        
    }

    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    function connectToserver(){
        $.post( "apis/fetch_posts.php", { user_type: "all"  }).done(function( data ) {
                        console.log("DATA : "+data);
                        var $obj = JSON.parse(data);
                        
                        console.log("Lenght : "+$obj.length);
                        for(let $i=0;$i<$obj.length;$i++){

                            
                            $post_id = $obj[$i]["postid"];
                            $username = $obj[$i]["username"];
                            $username_profile_img_url = $obj[$i]["user_profile_img"];
                            $post_img_url = $obj[$i]["post_img"];
                            $post_time = $obj[$i]["post_time"];
                            $post_des = $obj[$i]["post_des"];
                            $post_likes = $obj[$i]["likes"];

                            $post_likes = numberWithCommas($post_likes);

                            addCard($post_id,$username_profile_img_url,$username,$post_img_url,$post_time,$post_des,$post_likes);
                            console.log($obj[$i]["postid"]);
                        }
        });
    }

    
});
</script>
    <script src="script/kk.js"></script>
</body>
</html>