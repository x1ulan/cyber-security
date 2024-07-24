<?php
require_once "config.php";

session_start();

if(isset($_SESSION['isLogin'])){
  header('location: ./index.php');
  die();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    @$username = $_POST['username'];
    @$password = $_POST['password'];
    if(isset($username) and isset($password)){
        $query = "SELECT * FROM `users` WHERE username='$username';";
        $result = $sql->query($query);
        if($result->num_rows>0){
            header("location: ./register.php?err=user%20existed");
            die();
        }else{
            $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password');";
            $result = $sql->query($query);
            header('location: ./login.php');
            die();
        }
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
    <h2 class="text-3xl font-bold text-white mb-4">Register!</h2>
    <input required name="username" type="text" placeholder="username" class="bg-white dark:bg-zinc-800 text-zinc-800 dark:text-white rounded-lg px-4 py-2 mb-4 w-64">
    <input required name="password" type="password" placeholder="Password" class="bg-white dark:bg-zinc-800 text-zinc-800 dark:text-white rounded-lg px-4 py-2 mb-4 w-64">
    <?php $t=@$_GET["err"];if(isset($t)){echo "<p style=\"color:red\">$t</p>";} ?>

    <input type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mb-4"></input>
    <p class="text-white mb-4">Have an account? <a href="login.php" class="text-blue-300 hover:underline">Login here</a></p>

</form>
  </body>
</html>