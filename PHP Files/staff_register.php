<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'ezToll');

    if (isset($_POST['reg_staff'])){

        $badge_no = $_POST['badge_no'];
        $sname = $_POST['sname'];
        $toll = $_POST['toll']
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
</head>
<body>
    <h2>Staff - Register</h2>
    <?php
        if (isset($_SESSION['message'])) {
            echo "<div>", $_SESSION['message'], "</div>";
            unset($_SESSION['message']);    
        }
    ?>      
    <form id="form" method="post" action="staff_register.php">
        <div class="input-group">
            <label>Badge No.</label>
            <input type="text" name="badge_no">
        </div>
        <div class="input-group">
            <label>Staff Name</label>
            <input type="text" name="sname" >
        </div>
        <div class="input-group">
            <select name="toll">
                <option value="Vashi Toll Plaza">Vashi Toll Plaza</option>
                <option value="Airoli Toll Plaza">Airoli Toll Plaza</option>
                <option value="Dahisar Toll Plaza">Dahisar Toll Plaza</option>
                <option value="Mulund Eastern Express Highway Toll Plaza">Mulund Eastern Express Highway Toll Plaza</option>
                <option value="Mulund LBS Marg Toll Plaza">Mulund LBS Marg Toll Plaza</option>
            </select>
        </div>
        <div class="input-group">
            <label>Date of Birth</label>
            <input type="text" name="dob" >
        </div>
        <div class="input-group">
            <label>Contact</label>
            <input type="text" name="contact">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="confirm_password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_staff">Register</button>
        </div>
        <p>
            Already a member? <a href="staff_login.php">Sign in</a>
        </p>
    </form>    
</body>
</html>