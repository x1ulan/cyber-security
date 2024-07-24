<?php
@$q = $_GET['query'];

$r = array(
    1=>"其實資安是非常值得我們深思的。",
    2=>"帶著這些問題，我們來審視一下資安。",
    3=>"為什麼資安對我們來說這麼重要？",
    4=>"問題的關鍵究竟為何？",
    5=>"就我個人來說，資安對我的意義，不能不說非常重大。"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xss me</title>
</head>
<body>
    <form method="get">
        <p>Search</p>
        <input name="query" type="text">
        <input type="submit" value="submit">
    </form>
    <?php if(isset($q)){
        echo "the search result of $q is:<br>";
        echo $r[time()%5+1];
        }?>
</body>
</html>