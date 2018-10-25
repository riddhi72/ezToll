<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<header>
  <h2 align="center"><b>EzToll</b></h2>
</header>


<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}

    header{
     
     background: #9cb8b3;

    border-color: #2eb8b8;
    font: 600 1.5em/1 'Raleway', sans-serif;
        color: rgba(0,0,0,.5);
        text-align: center;
        text-transform: uppercase;
        letter-spacing: .5em;
        
    }


    * {box-sizing: border-box;}

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #dcdcdc;
    }

    .topnav {
      overflow: hidden;
      background-color: #e9e9e9;
    }

    .topnav a {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #2196F3;
      color: white;
    }

    .topnav input[type=text] {
      float: right;
      padding: 6px;
      margin-top: 8px;
      margin-right: 16px;
      border: none;
      font-size: 17px;
    }

    @media screen and (max-width: 600px) {
      .topnav a, .topnav input[type=text] {
        float: right;
        display: block;
        text-align: left;
        width: 90%;
        margin: 0;
        padding: 14px;
      }
      .topnav input[type=text] {
        border: 1px solid #ccc;  
        float:right;
      }
    }



    .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #4682B4;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 30%;
      transition: all 0.5s;
      cursor: pointer;
      margin: 35px 40px 5px 40px;
      box-shadow: 5px 10px 8px grey;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }
    .button span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 75%;
        height: 90% ;
    }


    .mySlides{
      margin-left: auto;
      margin-right: auto;
      max-height: 600px;
    }
    .carousel{
      width: 100%;
      height: auto;
    }
    .social:hover {
         -webkit-transform: scale(1.1);
         -moz-transform: scale(1.1);
         -o-transform: scale(1.1);
     }
     .social {
         -webkit-transform: scale(0.8);
         /* Browser Variations: */

         -moz-transform: scale(0.8);
         -o-transform: scale(0.8);
         -webkit-transition-duration: 0.5s;
         -moz-transition-duration: 0.5s;
         -o-transition-duration: 0.5s;
     }


    #social-fb:hover {
         color: #3B5998;
     }
     #social-tw:hover {
         color: #4099FF;
     }
     #social-gp:hover {
         color: #d34836;
     }
     #social-em:hover {
         color: #f39c12;
     }

    .dropdown {
        float: left;
        overflow: hidden;
    }

    .dropdown .dropbtn {
        font-size: 16px;    
        border: none;
        outline: none;
        color: black;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    <body class="w3-light-grey">
</style>

<!-- Navigation Bar -->
<div class="topnav">
  <a class="active" href="#home">Places To Visit</a>
  <a href="rates.php">Rates</a>
  <a href="aboutUs.php">About Us</a>
            
  <div class="dropdown">
    <button class="dropbtn">Operate As
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="login.php">Driver</a>
      <a href="staff_login.php">Staff</a>
    </div>
  </div> 
</div>
    


<!-- Header -->

<div class="main">
    <div class="container">
      <div class="header">
        <div style="text-align:center;border:1px solid black;background-color:#A7A7A9">
        </div>
        <div style="text-align:center">
          <h2><b>An <i>Easy</i> and <i>Fast</i> way to pay your <i>Toll</i></b></h2>
        </div>
        

       <div>
        <img class="mySlides" src="style/toll1.jpg">
        <img class="mySlides" src="style/toll2.jpg">
        <img class="mySlides" src="style/toll6.jpg">
      </div>

<!-- Page content -->


  <div class="w3-container" id="contact">
    <h2>Contact</h2>
    <p>If you have any questions, do not hesitate to ask them.</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Mumbai, India<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +91 15151515<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: mail@mail.com<br>
  </div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <h3 style="text-align:center;padding-top:25px;">&copy;by 2018 www.eztoll.com</h3>

</footer>

<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2500); // Change image every 2.5 seconds
}
</script>
</body>
</html>