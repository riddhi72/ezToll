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
</head>
<body>
    <h2>Staff - Login</h2>
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div>", $_SESSION['message'], "</div>";
            unset($_SESSION['message']);    
        }
    ?>
    <form method="post" action="staff_login.php">
        <div class="input-group">
            <label>Badge No.</label>
            <input type="text" name="badge_no">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_staff">Login</button>
        </div>
        <p>
            Not a member yet ? <a href="staff_register.php">Sign up</a>
        </p>
    </form>    
</body>
</html>
