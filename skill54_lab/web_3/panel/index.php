<?php
session_start();
if (!isset($_SESSION["username"])){
    http_response_code(301);
    header('location:../');
}
if (!isset($_COOKIE["is_admin"])){
    setcookie("is_admin",base64_encode("no"),time()+3600, "/");
    header('refresh:0');
}
if (!isset($_COOKIE["username"])){
    setcookie("username",base64_encode($_SESSION["username"]),time()+3600, "/");
    header('refresh:0');
}
if (base64_decode(urldecode($_COOKIE["is_admin"]))==="yes"){
    if (base64_decode(urldecode($_COOKIE["username"]))==="seadog007"){
        echo "Hello admin seadog007<br>here is your flag<br>skill54{s3ad0g007}";
    }else{
        echo "you are admin<br>but I only give flag to seadog007";
    }
}else{
    $m = base64_decode(urldecode($_COOKIE["username"]));
    echo "hello $m";
}