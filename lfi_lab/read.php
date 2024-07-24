<?php
if(include_once "./files/".$_GET['file']){
    echo "<br><br><a style='text-decoration:none;' href='./download.php?file=".$_GET['file']."'>download file</a>";
}