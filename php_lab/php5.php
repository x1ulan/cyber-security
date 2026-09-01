<?
show_source(__FILE__);
error_reporting(0);
echo "<br>";

include 'config.php';

if (isset($_POST["md5"])){
    $md5 = $_POST["md5"];
    
    $secret = $php5_secret; //include from config.php
    if ($md5 == md5($md5)){
        echo $secret;
    }
    else{
        echo "Are you kidding me?";
    }
}
