<?php
require_once "../config.php";

$query = "SELECT * FROM `users`;";

$result = mysqli_query($sql, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <h1>admin panel</h1>
    <table>
        <thead>
          <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $username = $row["username"];
                $password = $row["password"];
                echo <<<TABLE
                    <tr>
                        <td>$id</td>
                        <td>$username</td>
                        <td>$password</td>
                    </tr>
                TABLE;
            }
        }
        ?>
        </tbody>
      </table>
</body>
</html>