<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: http://localhost/api_ajax/index.html");
}
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
    <?php 
    $uname = $_SESSION['username']; 
    ?>

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

                                    <div class="card">
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

                                    </div>

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

            <div class="post-upload">
               jhbhgvydsf
            </div>
        </div>    
    </div>

    <!-- custom script -->
    <script src="script/home.js"></script>
    <script src="script/kk.js"></script>
</body>
</html>