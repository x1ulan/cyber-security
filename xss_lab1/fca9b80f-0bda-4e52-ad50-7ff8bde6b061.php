<?php

session_start();

if($_GET["pass"]="password"){
    $_SESSION["role"]="Admin";
}
header("location: ./");
die();