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
</head>
<body>
    <h2>Driver - Login</h2>
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div>", $_SESSION['message'], "</div>";
            unset($_SESSION['message']);    
        }
    ?>
    <form method="post" action="login.php">
        <div class="input-group">
            <label>Licence No.</label>
            <input type="text" name="licno">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_driver">Login</button>
        </div>
        <p>
            Not a member yet ? <a href="register.php">Sign up</a>
        </p>
    </form>    
</body>
</html>
