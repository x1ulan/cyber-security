<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['username']) && isset($_POST['password'])){
        if($_POST['username']=='xiulannnn' && $_POST['password']=='IWANTAGIRLFRIEND'){
            echo '<code>tcivs{b4s1c_g1t_l3ak_0x1}</code>';
        }else{
            echo '<strong>username or password error</strong>';
        }
    }
}else{
    http_response_code(403);
    die();
}