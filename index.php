<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <!-- custom style -->
    <link rel="stylesheet" href="http://localhost/api_ajax/styles/auth.css" >

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-box" >

        <p>Mantragram</p>

        <form class="login_form" action="apis/login.php" method="POST">
            <input placeholder="Username or email" type="txet" name="login_email" id="_login_email">
            <input placeholder="Password" type="password" name="login_pass" id="login_pass">
            <input id="#login_form_submit" style="background-color: #4295F6;font-weight: bolder;color: white;cursor: pointer;" value="Log in" type="submit">
            <!-- <button id="#login_form_submit" style="background-color: #4295F6;font-weight: bolder;color: white;cursor: pointer;">Log in</button> -->
            <?php 
            if(isset($_GET["loginFailed"]))
            { 
                //$reasons = array("password" => "Wrong Username or Password", "blank" => "You have left one or more fields blank."); 
                
                if ($_GET["loginFailed"]) 
                echo $reasons[$_GET["reason"]];
            } 
            ?>

        </form>

        <form class="signup_form" action="apis/signup.php" method="POST">
            <input placeholder="Email" type="email" name="email" id="_email">
            <input type="text" placeholder="Full name" name="fullname" id="_fullname">
            <input placeholder="Username" type="text" name="username" id="_username">
            <input placeholder="Password" type="password" name="password" id="_pass">
            <input style="background-color: #4295F6;font-weight: bolder;color: white;cursor: pointer;" value="Sign up" type="submit">
        </form>
        

    </div>
    <div class="footer" >
        <p class="footer-text"><p>
    </div>

    <span class="kpl"></span>

    <script>
        $(document).ready(function(){
            $(".signup_form").hide();
            $(".footer-text").html("Don't have an account? <span id='signup'>Sign up</span>");

            $("#signup").click(function(){
                $(".login_form").hide();
                $(".signup_form").show();
                $(".footer-text").html("Have an account? <span id='login'>Log in</span>");

                $("#login").click(function(){
                    location.reload();
                });               
            });


            // Form validation
            $(".signup_form").validate({

                //rules
                rules:{
                    email:{
                        required:true,
                        email: true
                    },
                    fullname:{
                        required:true,
                        minlength: 3
                    },
                    username:{
                        required:true,
                        minlength: 4
                    },
                    password:{
                        required:true,
                        minlength:8
                    }

                },

                // message
                messages:{
                    email: {
                        minlength: "The email should be in the format: abc@domain.tld"
                    },
                    fullname: {
                        minlength: "Name should be at least 3 characters!"
                    },
                    username: {
                        minlength: "Username should be at least 4 characters"
                    },
                    password: {
                        minlength: "Password should be at least 8 characters"
                    }
                }
            });
            $(".login_form").validate({
                //rules
                rules:{
                    login_email:{
                        required:true,
                    },
                    login_pass:{
                        required:true,
                        minlength:8
                    }

                },
                // message
                messages:{
                    login_email: {
                        minlength: "This field is required!"
                    },
                    login_pass: {
                        minlength: "Password should be at least 8 characters"
                    }
                }
                });


            // Eamil validation by AJAX
            var $email = $("#_email");
            $email.on("input", function(){
                $(".alert_msgs").remove();

                $.post( "apis/compare.php", { data: $(this).val(), comp_with: "email" })
                    .done(function( data ) {
           
                });
                // $(".kpl").text($(this).val());
            });


            // Username validation by AJAX
            var $username = $("#_username");
            $username.on("input", function(){
                $(".alert_msgs2").remove();

                $.post( "apis/compare.php", { data: $(this).val(), comp_with: "username" })
                    .done(function( data ) {
                        if( data=="true"){
                            // $(".kpl").text("This username is exists try diffrent !");
                            $username.css("border-color","red");

                            var $msg = $("<span class='alert_msgs2'></span>").text("This username is exists try diffrent !");
                            $username.after($msg);
                            $(".alert_msgs2").css({
                                "font-size": "xx-small",
                                "color": "red"
                            });
                        }else{
                            // $(".kpl").text(data);
                            $username.css("border-color","#dbdbdb");
                            $(".alert_msgs2").remove();
                        }
                });
                // $(".kpl").text($(this).val());
            });


            var $user_email = $("#_login_email");
            $user_email.on("input", function(){
                $(".alert_msgs3").remove();

                $.post( "apis/comapre_with2.php", { data: $(this).val(), comp_with: "username", comp_with2: "email" })
                    .done(function( data ) {
                        if( data=="false"){
                            // $(".kpl").text("This username is exists try diffrent !");
                            $user_email.css("border-color","red");

                            var $msg = $("<span class='alert_msgs3'></span>").text("This username or email is not exists !");
                            $user_email.after($msg);
                            $(".alert_msgs3").css({
                                "font-size": "xx-small",
                                "color": "red"
                            });
                        }else{
                            // $(".kpl").text(data);
                            $user_email.css("border-color","#dbdbdb");
                            $(".alert_msgs3").remove();
                        }
                });
                // $(".kpl").text($(this).val());
            });

            // var $login_pass = $("#login_pass");
            // $login_pass.on("input", function(){
            //     $(".alert_msgs4").remove();

            //     $.post( "apis/direct_login.php", { pass: $(this).val(), id:  $("#_login_email").val()})
            //         .done(function( data ) {
            //             if( data=="true"){
            //                 $(".kpl").text(data);
            //                 $login_pass.css("border-color","#dbdbdb");
            //                 $(".alert_msgs4").remove();


            //             }else{
            //                 $(".kpl").text(data);
            //                 $login_pass.css("border-color","red");

            //                 var $msg = $("<span class='alert_msgs4'></span>").text("This username or email is not exists !");
            //                 $login_pass.after($msg);
            //                 $(".alert_msgs4").css({
            //                     "font-size": "xx-small",
            //                     "color": "red"
            //                 });
            //             }
            //     });
            //     //$(".kpl").text($(this).val()+" = "+$("#_login_email").val());
            // });


            $("#login_form_submit").on("click", function(){
                $(".kpl").text("kklick");
            });

        });

    </script>
</body>
</html>
