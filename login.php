<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'ezToll');

    if (isset($_POST['login_driver'])) 
    {
        $licno = mysqli_real_escape_string($conn,$_POST['licno']);
        $pwd = mysqli_real_escape_string($conn,$_POST['password']);
        
        $get_driverList_query = " SELECT User.u_id, Driver.licno, User.password, User.uname
                                  FROM User
                                  INNER JOIN Driver 
                                  ON User.u_id=Driver.fk_uid
                                  WHERE Driver.licno = '$licno'
                                ";
        $driver_row = mysqli_fetch_array(mysqli_query($conn, $get_driverList_query)); 
        if ($driver_row['password'] == $pwd) {
            $_SESSION['message'] = "Login Successful.";
            $_SESSION['driver_name'] = $driver_row['uname'];
            $_SESSION['licno'] = $driver_row['licno'];
            header("location: home.php");           
        }
        else {
            $_SESSION['message'] = "Login Credentials are invalid.";
        }

    }
?>





<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <script type="text/javascript" src="style/login.js"></script>
</head>
<body>
    
    <form class="form" name='Login' method="post" action="login.php">
        <h2>Driver - Login</h2>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<div>", $_SESSION['message'], "</div>";
                unset($_SESSION['message']);    
            }
        ?>
        <div class="input-box">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="licno" placeholder="License Number" required>
        </div>
        <div class="input-box">
            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>
        <div class="input-box">
            <input type="submit" value="Login" name="login_driver">
        </div>
        <p>
            Not a member yet ? <a href="register.php">Sign up</a>
        </p>
    </form> 


</body>
</html>
