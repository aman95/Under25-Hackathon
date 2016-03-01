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
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<!--<head>-->
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--<title>Welcome - --><?php //echo $userRow['user_email']; ?><!--</title>-->
<!--<link rel="stylesheet" href="style.css" type="text/css" />-->
<!--</head>-->
<!--<body>-->
<!--<div id="header">-->
<!--	<div id="left">-->
<!--    <label>Coding Cage</label>-->
<!--    </div>-->
<!--    <div id="right">-->
<!--    	<div id="content">-->
<!--        	hi' --><?php //echo $userRow['user_name']; ?><!--&nbsp;<a href="logout.php?logout">Sign Out</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div id="body">-->
<!--	<a href="http://www.codingcage.com/">Coding Cage - Programming Blog</a><br /><br />-->
<!--    <p>Focuses on PHP, MySQL, Ajax, jQuery, Web Design and more...</p>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->

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
                <li><a href="./home.php">Dashboard</a></li>
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


<div class="row center">
    <div class="col s12 m12 l12">
        <div class="card-panel grey darken-1 page2" id="papa">
      <span class="blue-text text-darken-2">
      <h3>Projects</h3></span>
            <!-- <a class="btn-floating btn-large waves-effect waves-light red" id="dynamo" onclick="display()"><i class="material-icons">add</i></a> -->
            <a class="btn-floating btn-large waves-effect waves-light red" id="dynamo2" href="make_graph.php"><i class="material-icons">add</i></a>

            <div class="row" id="firstrowapp">

                <!--  <div class="col s12 m4 l4">
                 <div class="card blue-grey darken-1">
                  <img class="mycust" width="171" src="./public/plus.png"> -->
                <!-- <div class="card-content white-text">
                  <span class="card-title">Card Title</span>
                  <p>I am a previous project. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively.</p>
                </div> -->
                <!--  <div class="card-action">
                   <a href="make_graph1.html">Create New Graph</a>

                 </div>
               </div> -->
                <!-- </div> -->

                <!-- <div class="col s12 m4 l3">
              <div class="card small blue-grey darken-1">
                <div class="card-image">
                  <img src="./public/plus.png">

                </div>
                <div class="card-content white-text">

                </div>
                <div class="card-action">
                  <a href="#">New Graph</a>

                </div>
              </div>
            </div> -->



                <!-- <div class="col s12 m4 l4" id="info">
                  <div class="card blue-grey darken-1" >
                    <div class="card-content white-text">
                      <span class="card-title">Card Title</span>
                      <p>I am a previous project. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                      <a href="#">This is a link</a>

                    </div>
                  </div>
                </div>

                <div class="col s12 m4 l4" >
                  <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <span class="card-title">Card Title</span>
                      <p>I am a previous project. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                      <a href="#">This is a link</a>

                    </div>
                  </div>
                </div> -->

                <!--  <div class="col s12 m4 l4" id="colapp">
                 </div>
                -->

            </div>


        </div>
    </div>
</div>


</body>

</html>