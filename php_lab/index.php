<?
$dir = scandir(".");

foreach ($dir as $key => $value) {
    if (preg_match('/\.php$/',$value)){
        if ($value!='config.php'){
            echo "<a href=$value>$value</a></br>";
        }
    }
}
