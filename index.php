
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
            <h1>Sign up</h1>
            <form action="" method="post">
                <label for="">Enter your Name:</label><br>
                <input type="text" name="getname"><br>

                <label for="">Enter Username:</label><br>
                <input type="text" name="getusername"><br>

                <label for="">Enter Email:</label><br>
                <input type="email" name="getemail"><br>

                <label for="">Choose Password:</label><br>
                <input type="password" name="getpassword"><br>

                <label for="">Comfirm Password:</label><br>
                <input type="password" name="getpassword2"><br><br>

                <button type="submit" name="submit">Sign up</button>

            </form>

            <?php

            if(isset($_POST["submit"])){
                require './database/db.php';
                $getname = $_POST['getname'];
                $getusername = $_POST['getusername'];
                $getpassword = $_POST['getpassword'];
                $getpassword2 = $_POST['getpassword2'];

                //select username from the table 
                $sql = "SELECT 	`userName` FROM `user_details` WHERE `userName` = '$getusername'";
                $sqlres = mysqli_query($connect, $sql);
                $rowcount = mysqli_num_rows($sqlres);

                // the if condition
                if($getname == '' && $getusername == '' && $getpassword  == ''){
                    echo "Form must be filled";
                    exit;
                }
                
                if($rowcount != 0){
                    echo "User name is not available!. try another one";
                    exit;
                }

                if($getpassword != $getpassword2){
                    echo "Comfirm password properly";
                    exit;
                }

                if(($rowcount == 0) && ($getpassword == $getpassword2)){
                    echo "You have successfully signed up ";
                    $gotologin = "<a href='login.php'>Log in</a>";
                    echo $gotologin;
                
                    $sql="INSERT INTO `user_details` (`fullName`, `userName`,	`password`) VALUES('$getname', '$getusername', '$getpassword')";
                    $sqlres=mysqli_query($connect, $sql);
                    exit;
                }
                
            }

            ?>
        </div>
    </div>
    
</body>
</html>