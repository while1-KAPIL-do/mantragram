function like_btn_clicked($post_id,$username){
    console.log($post_id+" clicked by "+$username);
    
    $btn_like = $("#btn_like_"+$post_id);
    if($btn_like.attr("src")=="icons/like.png"){
        $btn_like.attr("src","icons/unlike.png");
    }else if($btn_like.attr("src")=="icons/unlike.png"){
        $btn_like.attr("src","icons/like.png");
    }
    console.log("clicked  ="+"btn_like_"+$post_id);

}
