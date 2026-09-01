<?php
$f =  $_GET['f'];
$k1 = $_GET['k1'];
$k2 = $_GET['k2'];
if (hash('sha1', $f) === $k1 and hash('md5',$f) === $k2) {
    $f = 'file/'.$f;
    header("success");
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($f));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    if(ob_get_contents()) ob_clean();
    flush();
    readfile($f);
    exit;
}else{
    http_response_code(301);
    header("location:../");
}