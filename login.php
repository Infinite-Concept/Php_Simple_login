
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign | up</title>
</head>
<body>

    <div style="display:flex; align-items:center; justify-content: center; height: 100vh;">
        <div>
            <h1>Login</h1>
            <form action="" method="post">

                <label for="">Enter Username:</label><br>
                <input type="text" name="getusername"><br>

                <label for="">Choose Password:</label><br>
                <input type="password" name="getpassword"><br> <br>

                <button type="submit" name="submit">Login</button>

            </form>

            <?php

            if(isset($_POST["submit"])){
                require './database/db.php';
                $getusername = $_POST['getusername'];
                $getpassword = $_POST['getpassword'];

                //select username from the table 
                $sql = "SELECT * FROM `user_details` WHERE `userName` = '$getusername' AND `password` = '$getpassword'";
                $sqlres = mysqli_query($connect, $sql);
                $rowcount = mysqli_num_rows($sqlres);
               
                // the if condition
                if($getusername == '' && $getpassword  == ''){
                    echo "Input your login details";
                    exit;
                } elseif($rowcount == 0){
                    echo "<br/>" . "Account is not available!" . "<br/>";
                    echo "Please <a href='index.php'>Sign up </a>";
                    exit;
                }else{
                  session_start();
                  $_SESSION["loggedin"] = true;
                  $_SESSION["sendusername"] = $getusername;
                  header("location: Home.php");
                }

            
                
            }

            ?>
        </div>
    </div>
    
</body>
</html>