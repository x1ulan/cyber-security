<?
show_source(__FILE__);
error_reporting(0);
echo "<br>";

include 'config.php';
if (isset($_POST['secret'])){
    $secret = json_decode($_POST['secret']);
    $key = $php1_secret; //include from config.php

    if ($secret->key == $key){
        echo $key;
    }
    else {
        echo "try again( ͡° ͜ʖ ͡°)";
    }
}else {
    echo "Hello World!";
}