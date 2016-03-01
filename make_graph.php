<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!doctype html>
<html lang="en">
<head>
  <title>GraphBuilder</title>
  <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">
	<link rel="icon" href="/favicon.ico?v=2" type="image/x-icon">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="./js/jquery-2.1.4.min.js"></script>
	<script src="./js/myjs.js"></script>
  <link rel="stylesheet" href="./css/materialize.min.css">
  <link rel="stylesheet" href="./css/mycss.css">
  
  <script src="./js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

</head>

<body>
    
<div class="navbar-fixed">
  

  <nav >

    <div class="nav-wrapper grey darken-3">
      <a href="#!" class="brand-logo center"><span class="black-text">GRAPH LIBRARY</span></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

      <ul class="right hide-on-med-and-down">
        <li><a href="./dashboard.html">Dashboard</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="logout.php?logout">Logout</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="logout.php?logout">Logout</a></li>
      </ul>
     </div>
  </nav>

</div>
<div class="container">
  <div class="card-panel">
  <div class="row center">
    <h3 class="blue-text">Templates</h3>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m4 l4">
          <div class="card small">
            <div class="card-image">
              <img src="./public/b1.png">
              
            </div>
            <div class="card-content">
           
             <!--  <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p> -->
            </div>
            <div class="card-action">
              <a href="upload.php?graph=bar"> Bar Graph</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4 l4">
          <div class="card small">
            <div class="card-image">
              <img src="./public/temp2.png" height='180'>
              
            </div>
            <div class="card-content">
            
             <!--  <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p> -->
            </div>
            <div class="card-action">
              <a href="upload.php?graph=pi">Pi-Chart</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4 l4">
          <div class="card small">
            <div class="card-image">
              <img src="./public/temp3.jpg">
              
            </div>
            <div class="card-content">
            
             <!--  <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p> -->
            </div>
            <div class="card-action">
              <a href="upload.php?graph=scatter">Scatter Plot Graph</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card small">
            <div class="card-image">
              <img src="./public/temp1.png">
              
            </div>
            <div class="card-content">
            
             <!--  <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p> -->
            </div>
            <div class="card-action">
              <a href="upload.php?graph=mline">Multi-Line Graph</a>
            </div>
          </div>
        </div>
      </div>
            
  </div>
  </div>
</div>

</body>

</html>