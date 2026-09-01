<?php
session_start();
if ($_SERVER['REQUEST_METHOD']==='POST'){
    @$username = $_POST['username'];
    @$password = $_POST['password'];
    if ($username==='guest' and $password==='guest'){
        $_SESSION['username']=$username;
        http_response_code(301);
        header('location:./panel');
    }else{
        $e = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login panel</title>
</head>

<body>
    <h3>login page</h3>
    <form action="./" method="post">
        <label>username
            <input type="text" name="username">
        </label>
        <br><br>
        <label>password
            <input type="text" name="password">
        </label>
        <br><br>
        <input type="submit" value="login">
    </form>
    <?php
    if (isset($e) and $e === 1){
        echo "<br>";
        echo "<b style=color:red>login failed</b>";
    }?>
</body>
<!-- have no idea? -->
<!-- try guest / guest -->
</html>