<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$useridSess = $_SESSION['user'];
$userRow=mysql_fetch_array($res);


if(isset($_FILES['data-file'])) {
  $graph = $_GET["graph"];
  $proj = $_POST["proj_name"];
  $uploaddir = "./uploads/".$_SESSION['user']."/";
  if(!is_dir($uploaddir)) {
    mkdir($uploaddir);
  }

  $uploadfile = $uploaddir . basename($_FILES['data-file']['name']);
  $dataPath = "/uploads/$useridSess/".basename($_FILES['data-file']['name']);
  //echo '<pre>';
  if (move_uploaded_file($_FILES['data-file']['tmp_name'], $uploadfile)) {

    $query = "INSERT INTO projects(userid,name,data_src,type) VALUES('$useridSess','$proj','$dataPath','$graph')";
  //echo $query;
    if(mysql_query($query))
    {
      echo "<script> alert(\"File Uploaded Successfully...\"); </script>";
      header("Location: final_makegraph.php?projectName=".$proj."&dataURL=".$dataPath);
    } else {
      echo "<script> alert(\"Error Occured...\"); </script>";
    }

  } else {
    echo "<script> alert(\"oop something went wrong\"); </script>";
  }

  //echo 'Here is some more debugging info:';
  //print_r($_FILES);

  //print "</pre>";


} else {

}
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
        <li><a href="./home.php">Dashboard</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="/logout.php?logout">Logout</a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="/logout.php?logout">Logout</a></li>
      </ul>
    </div>
  </nav>

</div>
<div class="container">
  <div class="card-panel">
    <div class="row center">
      <h3 class="blue-text">Uploading</h3>
      <div class="divider"></div>
      <div class="row center" >
        <div class="col s12 m8 l8">
          <form action="" method="post" enctype="multipart/form-data">

            <div class="input-field col s12 m8 offset-m4 l8 offset-l4">
              <input id="project_name" name="proj_name" type="text" class="validate">
              <label for="project_name">Project Name</label>
            </div>

            <div class="input-field col s12 m8 offset-m4 l8 offset-l4">
              <input id="api_endpoints" name="api_endpt" type="text" class="validate">
              <label for="api_endpoints">RestEndPoint URL</label>
            </div>
            <div class="row center">
              <div class="col s12 m6 offset-m4 l6 offset-l4">
                <h5>OR</h5>
              </div>
            </div>

            <div class="file-field input-field col s12 m8 offset-m4 l8 offset-l4">
              <div class="btn">
                <span>File</span>
                <input type="file" name="data-file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>


        </div>

      </div>
      <div class="row center">
        <div class="col s12 m12  l12">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

</body>

</html>