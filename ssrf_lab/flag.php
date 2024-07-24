<?php
$whitelist = array(
    '127.0.0.1',
    '::1',
    'localhost'
);

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    die("You are not <strong>LOCALHOST</strong>");
}else{
    echo "tcivs{SSR::[fmaster]!}";
}