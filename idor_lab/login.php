<?php
session_start();
require_once "config.php";

if(isset($_SESSION['isLogin'])){
  header('location: ./index.php');
  die();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password';";
    $result = $sql->query($query);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $u = $row['id'];
            $_SESSION["default_id"] = $u;
        }
        $_SESSION['isLogin']=true;
        header("location: ./index.php?user=$u");
        die();
    }else{
        header("location: ./login.php?err=username%20or%20password%20is%20incorrect");
        die();
    }
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <form method="POST" class="flex flex-col justify-center items-center min-h-screen bg-gradient-to-br from-purple-500 to-pink-500 dark:from-zinc-800 dark:to-zinc-900">
    <h2 class="text-3xl font-bold text-white mb-4">Welcome Back!</h2>
    <input required name="username" type="text" placeholder="username" class="bg-white dark:bg-zinc-800 text-zinc-800 dark:text-white rounded-lg px-4 py-2 mb-4 w-64">
    <input required name="password" type="password" placeholder="Password" class="bg-white dark:bg-zinc-800 text-zinc-800 dark:text-white rounded-lg px-4 py-2 mb-4 w-64">
    <?php $t=@$_GET["err"];if(isset($t)){echo "<p style=\"color:red\">$t</p>";} ?>

    <input type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mb-4"></input>
    <p class="text-white mb-4">Don't have an account? <a href="register.php" class="text-blue-300 hover:underline">Register here</a></p>
</form>
  </body>
</html>