<?php
session_start();

@$uploadfile = $_FILES["image"];
@$url = $_POST['url'];
if(isset($uploadfile) && $uploadfile!="NULL" && $url=="" && $_SERVER['REQUEST_METHOD']=="POST"){
    $filename = md5(time());
    $path = "./upload/image/".md5(time()).".png";
    
    move_uploaded_file($uploadfile["tmp_name"],$path);
    $_SESSION['image'] = $path;
    echo substr($path,2);

}else if(isset($url) && $url!="" && $_SERVER['REQUEST_METHOD']=="POST"){
  
    $regex = "/^(https?:\/\/)?(([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,}|localhost|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(:\d{1,5})?(\/[^\s]*)?$/";
    if(!preg_match($regex, $url)){
        echo "error";
        die();
    }

    $path = "./upload/image/".md5(time()).".png";

    file_put_contents($path,file_get_contents($url));

    $_SESSION['image'] = $path;
}else{
    http_response_code(403);
    die();
}


