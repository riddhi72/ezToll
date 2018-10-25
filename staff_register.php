<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'ezToll');

    if (isset($_POST['reg_staff'])){

        $badge_no = $_POST['badge_no'];
        $sname = $_POST['sname'];
        $toll = $_POST['toll'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['confirm_password'];

        if ($pwd == $cpwd){
            $reg_user_query = "INSERT INTO User  (uname, phone, dob, password) VALUES('$sname', '$contact', '$dob', '$pwd')";
            mysqli_query($conn, $reg_user_query);
            $reg_UID_query = "SELECT * FROM User WHERE phone='$contact'";
            $row = mysqli_fetch_row(mysqli_query($conn, $reg_UID_query));
            $userID = $row[0];       
            $reg_staff_query = "INSERT INTO Staff VALUES('$badge_no', '$userID', '$toll' ) ";
            mysqli_query($conn, $reg_staff_query);
            $_SESSION['message'] = "Record Added.";
            header("location: staff_login.php");
        }
        else{
            $_SESSION['message'] = "Passwords do not match";
        }
    }
    
?>






<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <script type="text/javascript" src="style/register.js"></script>
</head>
<body>
    
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div>", $_SESSION['message'], "</div>";
            unset($_SESSION['message']);    
        }
    ?>  
    <form id="form" method="post" name="Registeration" action="staff_register.php" class="form" style="border:1px solid #ccc" >
        <div class="container">   
            <h2>Staff - Register</h2> 
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="badge_no" placeholder="Badge Number" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="sname" placeholder="Staff Name" required>
            </div>
            <div class="input-box">
                <select name="toll">
                    <option value="Vashi Toll Plaza">Vashi Toll Plaza</option>
                    <option value="Airoli Toll Plaza">Airoli Toll Plaza</option>
                    <option value="Dahisar Toll Plaza">Dahisar Toll Plaza</option>
                    <option value="Mulund Eastern Express Highway Toll Plaza">Mulund Eastern Express Highway Toll Plaza</option>
                    <option value="Mulund LBS Marg Toll Plaza">Mulund LBS Marg Toll Plaza</option>
                </select>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="contact" placeholder="Contact" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <p>Agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <label><input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me </label>
            <div class="input-box">
                <input type="submit" name="reg_staff"value="Register">
            </div>
            Already a member? <a href="staff_login.php">Sign in</a>
        </p>
        </div>
    </form>    
</body>
</html>