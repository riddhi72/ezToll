<?php 
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'ezToll');

    if (isset($_POST['login_staff'])){

        $badge_no = $_POST['badge_no'];
        $pwd = $_POST['password'];

        $get_staffList_query = " SELECT User.u_id, Staff.badge_no, User.password, User.uname
                                  FROM User
                                  INNER JOIN Staff 
                                  ON User.u_id=Staff.fk_uid
                                  WHERE Staff.badge_no = '$badge_no'
                                ";
        $staff_row = mysqli_fetch_row(mysqli_query($conn, $get_staffList_query)); 
        if ($staff_row[2] == $pwd) {
            $_SESSION['message'] = "Login Successful.";
            $_SESSION['staff_name'] = $staff_row[3];
            $_SESSION['badge_no'] = $staff_row[1];
            header("location: staff_home.php");           
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
    <form class="form" name='Login' method="post" action="staff_login.php">
        <h2>Staff - Login</h2>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<div>", $_SESSION['message'], "</div>";
                unset($_SESSION['message']);    
            }
        ?>
        <div class="input-box">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="badge_no" placeholder="Badge Number" required>
        </div>
        <div class="input-box">
            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>
        <div class="input-box">
            <input type="submit" value="Login" name="login_staff">
        </div>
        <p>
            Not a member yet ? <a href="staff_register.php">Sign up</a>
        </p>
    </form> 

</body>
</html>
