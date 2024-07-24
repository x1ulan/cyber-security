<?php
session_start();


if(!isset($_SESSION["stage"])){
    $_SESSION["stage"]=0;
}

$stage = $_SESSION["stage"];
$method = $_SERVER["REQUEST_METHOD"];

echo "<h1>you successfully ".$method." the server</h1><h2>";

if($stage==0 && $method=="GET"){
    echo "can you GET <code>role=loser</code> to me?";
    $_SESSION["stage"]=1;
}else if($stage==1){
    if($method== "GET" && @$_GET["role"]=="loser"){
        echo "then, can you POST <code>name=dora</code> to me?";
        $_SESSION["stage"]=2;
    }else{
        echo "can you GET <code>role=loser</code> to me?";
    }

}else if($stage==2 ){
    if($method=="POST" && @$_POST["name"]== "dora"){
        echo "finally, if you use <code>s3cr3t_m3th0d</code> to me<br>you will get FLAG!";
        $_SESSION["stage"]=3;
    }else{
        echo "then, can you POST <code>name=dora</code> to me?";
    }

}else if($stage== 3){
    if($method== "s3cr3t_m3th0d"){
        echo "here is your flag...<br>tcivs{m3th0d_m4st3r}";
    }else{
        echo "finally, if you use <code>s3cr3t_m3th0d</code> to me<br>you will get FLAG!";
    }
}
echo "</h2>";