<?
show_source(__FILE__);
error_reporting(0);
echo "<br>";

include 'config.php';

if (isset($_GET["a"]) and isset($_GET["b"])){
    $a = $_GET["a"];
    $b = $_GET["b"];

    $secret = $php4_secret; //include from config.php
    if ((string)$a != (string)$b){
        if (md5($a) === md5($b)){
            echo $secret;
        }
        else{
            echo "Wrong Answer😇";
        }
    }
    else{
        echo "Use your PRO skill!";
    }
}
