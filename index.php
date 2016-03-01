<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$upass = mysql_real_escape_string($_POST['pass']);

	$username = trim($username);
	$upass = trim($upass);

	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_name='$username'");
	$row=mysql_fetch_array($res);

	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		$_SESSION['username'] = $row['user_name'];
		header("Location: home.php");
	}
	else
	{
		?>
		<script>alert('Username / Password Seems Wrong !');</script>
		<?php
	}

}

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));

	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);

	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result); // if email not found then register

	if($count == 0){

		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
			?>
			<script>alert('Successfully registered. You can now Login');</script>
			<?php
//			$_SESSION['user'] =$uname;
//			$_SESSION['username'] = $uname;
//			header("Location: home.php");
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
	}
	else{
		?>
		<script>alert('Sorry username already taken ...');</script>
		<?php
	}

}
?>

<!doctype html>
<html lang="en">
<head>
	<title>GraphBuilder</title>
	<link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./public/favicon.ico" type="image/x-icon">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="./js/jquery-2.1.4.min.js"></script>
	<script src="./js/myjs.js"></script>
	<link rel="stylesheet" href="./css/materialize.min.css">
	<link rel="stylesheet" href="./css/mycss.css">

	<script src="./js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

</head>

<body onload="myFunction()">

<div class="navbar-fixed">
	<nav >
		<div class="nav-wrapper indigo darken-3">
			<a href="#!" class="brand-logo center"><span class="black-text">GRAPH LIBRARY</span></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">About</a></li>
				<li><a href="#">Documentation</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="#">About</a></li>
				<li><a href="#">Documentation</a></li>
				<li><a href="#">Javascript</a></li>

			</ul>
		</div>
	</nav>

</div>
<!-- Page Content goes here -->
<div class ="section custom">

	<div id="modal1" class="modal">

		<div class="modal-content">
			<div class="row">
				<div class="col s12 m12 l12">
					<ul class="tabs">
						<li class="tab col s3"><a class="active" href="#test1">LOGIN</a></li>
						<li class="tab col s3"><a href="#test2">SIGN UP</a></li>
					</ul>
				</div>

				<!-- LOGIN TAB -->
				<div id="test1" class="col s12 m12 l12">

					<div class="row">
					</div>
					<div class="row">
						<form class="col s12 m12 l12" method="post">
							<div class="row">
								<div class="col s12 m6 offset-m3 l6 offset-l3">
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">account_circle</i>
										<input id="icon_prefix" type="text" class="validate" name="username">
										<label for="icon_prefix">Username</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<i class="material-icons prefix">phonelink_lock</i>
										<input id="password" type="password" class="validate" name="pass">
										<label for="password">Password</label>
									</div>
								</div>

							</div>

							<div class="row center">
								<button class="btn waves-effect waves-light " type="submit" name="btn-login">
									<a href="dashboard.html" class="white-text">Login</a>
									<i class="material-icons right">input</i>
								</button>
							</div>
						</form>
					</div>
				</div>

				<!-- SIGNUP TAB -->
				<div id="test2" class="col s12 m12 l12">
					<div class="row">
						<form class="col s12 m12 l12" method="post">
							<div class="row">
								<div class="col s12 m6 l6">
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">account_circle</i>
										<input id="icon_prefix" type="text" class="validate" name="uname">
										<label for="icon_prefix">Username</label>
									</div>
								</div>
								<div class="col s12 m6 l6">
									<div class="input-field col s12 m12 l12">
										<i class="material-icons prefix">email</i>
										<input id="icon_telephone" type="email" class="validate" name="email">
										<label for="icon_telephone">Email</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col s12 m6 l6">
									<div class="input-field col s12 m12 l12">
										<i class="material-icons prefix">phonelink_lock</i>
										<input id="icon_prefix" type="password" class="validate" name="pass">
										<label for="icon_prefix">Password</label>
									</div>
								</div>
								<div class="col s12 m6 l6">
									<div class="input-field col s12 m12 l12">
										<i class="material-icons prefix">phonelink_lock</i>
										<input id="icon_telephone2" type="password" class="validate" name="cpass">
										<label for="icon_telephone2">Confirm Password</label>
									</div>
								</div>
							</div>
							<div class="row center">
								<button class="btn waves-effect waves-light " type="submit" name="btn-signup">
									<a href="dashboard.html" class="white-text">Register</a>
									<i class="material-icons right">input</i>
								</button>
							</div>
						</form>
					</div>

				</div>


			</div>

		</div>



	</div>


	<div class="row center">

		<h3 class="splash">DATA VISUALIZATION </h3>
		<h4 class="white-text">AS A SERVICE</h4>

	</div>

	<div class="row center">

		<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Let`s Get Started

			<i class="material-icons right">send</i>

		</a>

	</div>

</div>


<div class="container">



	<div class="row">



		<div class="col s12 m12 l12">
			<div class="card-panel custom3 white">
             <span class="blue-text">

               <div class="row center">

				   <div class="col s12 m12 l12">
					   <img class="responsive-img" src="./public/cool_pic.png">
				   </div>
			   </div>
              <div class="divider"></div>
              <blockquote>
				  We Provide data visualization as a service to people who have the authority to access data but
				  don`t have knowledge to conclude any think from it.<br>
				  Visualized data can help to analyse the potential that actually lies in a text formatted data.

			  </blockquote>
              <div class="divider"></div>
              <div class="row center">

				  <i class="large material-icons">group_work</i><br>
				  How It Works

			  </div>
              <div class="row center">

			  </div>







				 <!-- SOME CARD VIEWS HERE -->
              <div class="row center">
				  <div class="col s12 m4 l4" id="getheight" >
					  <div class="card blue-grey darken-1">
						  <div class="card-content white-text">
							  <span class="card-title">Registering</span>

						  </div>
						  <div class="card-action">

						  </div>
					  </div>
				  </div>
				  <div class="col s12 m8 l8" >
					  <div class="card-panel grey lighten-2 layout-cust" >
						  <blockquote>
							  The person uses to a simple interface to create a user session on our web app.<br>
							  further then creates a new project.
						  </blockquote>
					  </div>
				  </div>
			  </div>

                  <div class="row center">
					  <div class="col s12 m8 l8" >
						  <div class="card-panel grey lighten-2 layout-cust">
							  <blockquote>
								  Upload the data.
							  </blockquote>
						  </div>
					  </div>
					  <div class="col s12 m4 l4" id="getheight" >
						  <div class="card blue-grey darken-1">
							  <div class="card-content white-text">
								  <span class="card-title">Uploading</span>

							  </div>
							  <div class="card-action">

							  </div>
						  </div>
					  </div>

				  </div>

                   <div class="row center">
					   <div class="col s12 m4 l4" id="getheight" >
						   <div class="card blue-grey darken-1">
							   <div class="card-content white-text">
								   <span class="card-title">Customizing</span>

							   </div>
							   <div class="card-action">


							   </div>
						   </div>
					   </div>
					   <div class="col s12 m8 l8" >
						   <div class="card-panel grey lighten-2 layout-cust" >
							   <blockquote>
								   Customize using default templates and allowing of some property changes.
							   </blockquote>
						   </div>
					   </div>
				   </div>

                    <div class="row center">
						<div class="col s12 m8 l8" >
							<div class="card-panel grey lighten-2 layout-cust">
								<blockquote>
									A preview is generated and further file is available to download and include into any web app to display the above required graph.
								</blockquote>
							</div>
						</div>
						<div class="col s12 m4 l4" id="getheight" >
							<div class="card blue-grey darken-1">
								<div class="card-content white-text">
									<span class="card-title">Preview And Use</span>

								</div>
								<div class="card-action">

								</div>
							</div>
						</div>

					</div>



                    <div class="row center">
						<div class="col s12 m12 l12">
							<blockquote>

							</blockquote>
						</div>
					</div>
				 <!-- END -->



                  </span>
			</div>
		</div>
	</div>




</div>

</div>


<!-- <footer class="page-footer">

<div class="footer-content">
  <div class="container">
  © 2014 Copyright Text
  <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
  </div>
</div>
</footer> -->



</body>
</html>