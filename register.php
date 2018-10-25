<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'ezToll');

    if (isset($_POST['reg_driver'])){

        $licno = mysqli_real_escape_string($conn,$_POST['licno']);
        $dname = mysqli_real_escape_string($conn,$_POST['dname']);
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);
        $contact = mysqli_real_escape_string($conn,$_POST['contact']);
        $numveh = $_POST['numveh'];
        $pwd = mysqli_real_escape_string($conn,$_POST['password']);
        $cpwd = mysqli_real_escape_string($conn,$_POST['confirm_password']);

        if ($pwd == $cpwd)
        {
            // To insert Driver Info
            $reg_user_query = "INSERT INTO User (uname, phone, dob, password) VALUES('$dname', '$contact', '$dob', '$pwd')";
            mysqli_query($conn, $reg_user_query);
            $reg_UID_query = "SELECT u_id FROM User WHERE phone = $contact";
            $row = mysqli_fetch_row(mysqli_query($conn, $reg_UID_query));
            $userId = $row[0];
            $reg_driver_query = "INSERT INTO Driver VALUES('$licno', '$userId')";
            mysqli_query($conn, $reg_driver_query);
            // To insert Vehicle Info
            for ($i=1; $i <= $numveh ; $i++) {
                $test1 = "vtype".$i ;
                $test2 = "plateno".$i;
                $reg_vehicle_query = "INSERT INTO Vehicle VALUES('$_POST[$test2]', '$licno', '$_POST[$test1]')";
                mysqli_query($conn, $reg_vehicle_query);
                $reg_has_query = "INSERT INTO Has VALUES('$licno', '$_POST[$test2]')";
                mysqli_query($conn, $reg_has_query);
            }
            $_SESSION['message'] = "Record Added.";
            header("location: login.php");
        }
        else
            $_SESSION['message'] = "Passwords do not match";
    }
    
?>





<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <script type="text/javascript" src="style/register.js"></script>
    <title>Registration</title>
</head>
<body>

    <form id="form" method="post" name="Registeration" action="register.php" class="form" style="border:1px solid #ccc" >
        <div class="container">
            <h2>Driver - Register</h2>
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
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="dname" placeholder="Name" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>
            <div class="input-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="contact" placeholder="Phone Number" pattern="^(\+?\d{1,4}[\s-])?(?!0+\s+,?$)\d{10}\s*,?$" required>
            </div>
            <div class="input-box">
                <input type="number" name="numveh" placeholder="No. of Vehicles Owned" id="numveh">
                <button value="SUBMIT" onclick="func()">Submit</button>
            </div>
            <div id="Details" style="display: none;">
                <div class="input-box">
                    <label>Vehicle Type </label>
                    <select name="vtype" id="vtype">
                        <option value="CAR / JEEP">CAR / JEEP</option>
                        <option value="MINI BUS / LCV">MINI BUS / LCV</option>
                        <option value="TRUCK / BUS">TRUCK / BUS</option>
                        <option value="MULTI AXLE">MULTI AXLE</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Plate Number </label>
                    <input type="text" id="plateno" name="plateno">
                </div>
            </div>
            <div class="input-box">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="input-box">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                <input type="password" name="confirm_password" placeholder=" Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
            </div>
            <p>Agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <label><input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me </label>
            <div class="input-box">
                <input type="submit" name="reg_driver"value="Register">
            </div>
            Already a member? <a href="login.php">Sign in</a>
        </div>
    </form>

</body>

<script>
    function func(){
        var x = document.getElementById("numveh").value;
        var  text="";
        var i;
        for(i=1; i<=x; i++)
        {
            document.getElementById("vtype").name = "vtype" + i ;
            document.getElementById("plateno").name = "plateno" + i ; 
            text+="Details of Vehicle No. "+ (i) +"<br>"+document.getElementById("Details").innerHTML;              
        }
        document.getElementById("Details").innerHTML = text;
        document.getElementById("Details").style.display = "block";
    }
</script>
</html>
