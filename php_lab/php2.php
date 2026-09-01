<?
show_source(__FILE__);
error_reporting(0);
echo "<br>";

include 'config.php';

if (isset($_GET["a"]) and isset($_GET["b"])){
    $a = $_GET["a"];
    $b = $_GET["b"];
    $secret = $php2_secret; //include from config.php
    if ($a != $b){
        if (md5($a) == md5($b)){
            echo $secret;
        }
        else{
            echo "No No😇";
        }
    }
    else{
        echo "g3t_m3_p1s";
    }
}