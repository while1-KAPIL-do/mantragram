console.log("hello");

$(document).ready(function(){

    connectToserver();

    $btn_like = $("img#btn_like");
    $btn_like.on("click", function(){
        if($btn_like.attr("src")=="icons/like.png"){
            $btn_like.attr("src","icons/unlike.png");
        }else if($btn_like.attr("src")=="icons/unlike.png"){
            $btn_like.attr("src","icons/like.png");
        }
        console.log("clicked  !"+$btn_like.attr("src"));
    });

    function addCard(my_username_profile_img_url,my_username,my_post_img_url,my_post_time,my_post_des,my_post_likes) {
        $str = `
        <div class='card'>
            <div class='card-head'>
                <img src='${my_username_profile_img_url}'>
                <span id='post-username'>${my_username}</span>
            </div>
            <img class='card-img' src='${my_post_img_url}'>
            <div class='card-time'>${my_post_time}</div>
            <div class='card-footer'>
                <img id="btn_like" onclick="f1()" src='icons/unlike.png' width='25px'>
                <img id='btn_comment' src='icons/msg.png' width='25px'>
                <img id='btn_share' src='icons/share.png' width='25px'>
            </div>
            <div class='card-likes'>${my_post_likes} likes</div>
            <div class='card-footer-2'>
                <div class='user-data'>
                    <div class='user-name'>${my_username}</div>
                    <div class='user-des'>${my_post_des}</div>
                </div>
            </div>
        </div>
    `;
        $(".parent-card").append($str);

        
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

                            $username_profile_img_url = $obj[$i]["user_profile_img"];
                            $username = $obj[$i]["username"];
                            $post_img_url = $obj[$i]["post_img"];
                            $post_time = $obj[$i]["post_time"];
                            $post_des = $obj[$i]["post_des"];
                            $post_likes = $obj[$i]["likes"];

                            $post_likes = numberWithCommas($post_likes);

                            addCard($username_profile_img_url,$username,$post_img_url,$post_time,$post_des,$post_likes);
                            console.log($obj[$i]["username"]);
                        }
        });
    }

    

     
    
});