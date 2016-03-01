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
  <script src="/js/jquery-2.1.4.min.js"></script>
	<script src="/js/myjs.js"></script>
  <link rel="stylesheet" href="./css/materialize.min.css">
  <link rel="stylesheet" href="./css/mycss.css">
<!--  <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>-->

  
  <script src="./js/materialize.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

</head>

<body>

<div class="navbar-fixed">
  <nav >
    <div class="nav-wrapper indigo darken-3">
      <a href="#!" class="brand-logo center"><span class="black-text">GRAPH LIBRARY</span></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">About</a></li>
        <li><a href="badges.html">Documentation</a></li>
        <li><a href="collapsible.html">Contact Us</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">About</a></li>
        <li><a href="badges.html">Documentation</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
     </div>
  </nav>

</div>
  <div class="row">
  </div>
  <div class="row">
  <div class="col l6 center">
  <a class="waves-effect waves-light btn" href="#">Make Changes</a>
  </div>

  <div class="col l6 center">
  <a class="waves-effect waves-light btn" href="#">See Result</a>
    </div>
  </div>
<div class="row">
  <div class="col l12 hide-on-med-and-down">

    <div class ="col l6 card-panel white page">

    <!-- MAKING COLLAPSIBLES -->

    
    <ul class="collapsible" data-collapsible="accordion">

    <li>
      <div class="collapsible-header active"><i class="material-icons">whatshot</i>Start</div>
      <div class="collapsible-body">
        <p>
          Further each step allows you to customize the selected template for your use,so lets get started!.
          
        </p></div>
    </li>

    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Appearance</div>
      <div class="collapsible-body">
          <div class="row">
        
          <div class="input-field col s12 m4 l4">
          <input id="title" type="text" class="validate" onkeyup="changeTitle(event)">
          <label for="title">Title</label>
          </div>

           <div class="input-field col s12 m4 l4">
            <select>
              <option value="" disabled selected>Title Location</option>
              <option value="1">top left</option>
              <option value="2">top center</option>
              <option value="3">top right</option>
            </select>
            
          </div>

          <div class="input-field col s12 m4 l4">
          <input id="title2c" type="color">
          <label style="margin-top:15px">Title Color</label>
          </div>

          </div>
          <div class="row">

          <div class="input-field col s12 m4 l4">
          <input id="stitle" type="text" class="validate">
          <label for="stitle">Sub-Title</label>
          </div>

         <div class="input-field col s12 m4 l4">
          <input id="stitlec" type="color">
          <label style="margin-top:15px">Sub-Title Color</label>
          </div>

          </div>
          <div class="row">
          <div class="input-field col s12 m4 l4">
          <input id="xlabel" type="text" class="validate">
          <label for="xlabel">X-Axis Label</label>
          </div>
           <div class="input-field col s12 m4 l4">
          <input id="ylabel" type="text" class="validate">
          <label for="ylabel">Y-Axis Label</label>
          </div>
          
          
          <!-- input value -->
          
          
          <!-- input value -->
          
          <div class="col s12 m4 l4">
          <input type="checkbox" id="test2" />
          <label for="test2" style="margin-top:30px">Gridlines</label>
          </div>
          </div>

          
        
      </div>
    </li>

    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Color</div>
      <div class="collapsible-body">
        <div class="row center">
          <div class="col s6 m6 l6">
          
          <input class="with-gap" name="group1" type="radio" id="test3"  />
          <label for="test3">Ordinal</label>

          <input class="with-gap" name="group1" type="radio" id="test4"  />
          <label for="test4">Linear</label>

          </div>
        </div>
        
      </div>
    </li>
    
  </ul>

  <!-- apply button -->

  <button class="btn waves-effect waves-light" type="submit" name="action">Apply
            <i class="material-icons right">send</i>
  </button>


    </div>
    <div class ="col l6 card-panel white page" id="generated">
    </div>
  </div>
  
</div>
<script>
    var data;
    console.log("hhhh");
    $.get('<?php echo $_GET["dataURL"] ?>', function(response) {
        //alert('hello');
        data = JSON.parse(response);
    });
    bar_color = "#00000000";
    x_axis_label= "Donut Type";
    y_axis_label = "Units Sold";
    title_text = "Value vs Quantity";
    title_loc = [0,"width/2","width-margin.left"];
    title_sub_loc = [0,"width/2","width-margin.left"];
    title_color = "black";
    title_sub_color = "grey";
    title_sub = " Sub Title";

</script>

<link rel="stylesheet" href="js/main.css">
<script src="/js/d3.min.js"></script>
<script src="/js/graph.js"></script>

<script>
    doc
    function changeTitle(event) {
        title_text = $('#title').text();
        //console.log("sdkjfnjakd");

    }
</script>



</body>

</html>




















<!-- EXTRAAAAAAAAAAAAAS NO USE NOW DND-->

  

    <!-- USED LATER -->
    <!-- 
    Check boxes<br>
    multiple<br>
    reactive ,see dynamic changes<br><br>
    <form action="#">
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </form>
    <div class="input-field col l12">
    <select multiple>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Multiple Select</label>
  </div>
  <div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
    </label>
  </div>
  <input type="date" class="datepicker">
  <br><br>
  <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="input_text" type="text" length="10">
            <label for="input_text">Input text</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
            <label for="textarea1">Textarea</label>
          </div>
        </div>
      </form>
    </div> -->
<!--  -->