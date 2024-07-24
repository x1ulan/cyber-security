<?php
session_start();
require_once "config.php";

if (!isset($_SESSION["isLogin"])) {
    header("location: ./login.php");
    die();
}

if(!isset($_GET['user']) || $_GET['user']==""){
    $u = $_SESSION["default_id"];
    header("location: ./index.php?user=$u");
    die();
}


$query = "SELECT * FROM `users` WHERE `id`=" . $_GET['user'] . ";";
$result = $sql->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['number'] = $row['id'];
        $data = array(
            'username' => $row['username'],
            'password' => $row['password'],
            'number' => $row['id']
        );
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>

<body>
    <h1>profile</h1>
    <span>
        User No.
        <?=@$data['number'] ?>
    </span>
    <br>
    <span>
        username:
        <?=@$data['username'] ?>
    </span>
    <br>
    <span>
        password:
        <span style="cursor: pointer;" class="secret" onclick="show()">****</span>
    </span>
    <br>
    <a style="text-decoration: none;" href="./logout.php">logout</a>
</body>


<script>
    var isshow = 0;

    function show() {
        isshow = !isshow;
        if (isshow) {
            document.querySelector(".secret").innerText ='<?=@$data['password'] ?>'
        } else {
            document.querySelector(".secret").innerText = "****"
        }
        
    }
</script>

</html>