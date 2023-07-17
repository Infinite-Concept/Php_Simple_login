<?php
 session_start();

 if(!isset($_SESSION["loggedin"]) || $_SESSION['loggedin'] != true){
    header("location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welcome
        <?php echo $_SESSION["sendusername"] ?>
    </h1>

    <form action="" method="post">
        <button type="submit" name="logout">Log Out</button>
    </form>

    <?php

    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();

        header("location: login.php");

        exit;
    }
    ?>
</body>
</html>