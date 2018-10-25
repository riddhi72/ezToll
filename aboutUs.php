<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<style>

<style>
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 30%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>

<div class="container-fluid padding">
    <div class="row text-center welcome">
       <div class="col-12">
           <h1 class="display-4">
               Meet The Team
           </h1>
       </div> 
       <hr class="my-2">
       
    </div>
</div>


<div class="columns">
  <ul class="price">
  	<li class="header">Shrushti</li>
  	<li><img src="style/Shrushti.JPG" style="height:300px;width:250px"></li>
  	 <li class="grey"><a href="#" class="button">Profile</a></li>

  </ul>
</div>


<div class="columns">
  <ul class="price">
  	<li class="header">Riddhi </li>
  	<li><img src="style/Riddhi.jpg" style="height:300px;width:250px"></li>
  	 <li class="grey"><a href="#" class="button">Profile</a></li>
  </ul>
</div>


<div class="columns">
  <ul class="price">
  	<li class="header">Kushal </li>
  	<li><img src="style/KdCool.jpg" style="height:300px;width:250px"></li>
  	 <li class="grey"><a href="#" class="button">Profile</a></li>
  </ul>
</div>

</head>
</html>

