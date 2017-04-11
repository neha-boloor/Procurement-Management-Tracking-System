<!DOCTYPE html>
<head>
  <title>
    proKnap
  </title>
  <link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="image/png" rel="icon" href="http://localhost/proknap/images/logo-png.png" >
  <link type="text/css" href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" href="http://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/custom.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="http://localhost/proknap/loginstyle.css">
</head>

<?php
error_reporting(E_ERROR);
session_start();
include("http://localhost/proknap/functions.php");
$message="";
$user="root";
$p="";
$h="localhost";
$name=$_POST['name'];
$pwd=$_POST['password'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $db=mysqli_connect("localhost","$user","$p","proknap")
  or
  die("Unable to connect to MySQL");

  if(count($_POST)>0) {
    if($res=mysqli_query($db,"SELECT * FROM user where User_id='$name'")){

      $val=mysqli_fetch_array($res);

      $_SESSION["user_name"] = $_POST["name"];
      $_SESSION["auth"] = $val['Auth_id'];
      $_SESSION["dept"] =  $val['Dept_id'];
      $_SESSION['loggedin_time'] = time();
      if ($pwd == $val['password'])
      {
        if($val['Auth_id']==1)
        {
          header("Location: http://localhost/proknap/admin.php");
        }
        elseif ($val['Auth_id']==2){

          header("Location: http://localhost/proknap/procurementHead.php");
        }
        elseif($val['Auth_id']==3){

          header("Location: http://localhost/proknap/dealingOfficer.php");
        }
        elseif($val['Auth_id']==4)
        {
          header("Location: http://localhost/proknap/indentor1.php");
        }
        else 
        {
          $error = "Invalid Username or Password!";
        }
      }
  }
}
}
?>


<body>

  <nav class="navbar navbar-default navbar-inverse" role="navigation"style="box-shadow: 0 2px 10px black;">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <!--button type="button" class="navbar-brand pacifico white" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button-->
      <a class="navbar-brand" href="http://localhost/proknap/login.php" ><div style="font-size:25; font-family: 'Pacifico', cursive !important;">proKnap</div></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav cuprum white font20">

        <li><a href="http://localhost/proknap/it.php">IT</a></li>
        <li><a href="http://localhost/proknap/finance.php">Finance</a></li>
        <li><a href="http://localhost/proknap/electrical.php">Electrical</a></li>
        <li><a href="http://localhost/proknap/mech.php">Mechanical</a></li>

</ul>


<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
    <a href="#" name="logindrop" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
    <ul id="login-dp" class="dropdown-menu">
      <li>
        <div class="row">
          <div class="col-md-12">
            <form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="UTF-8" id="login-nav">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">User ID</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail2" placeholder="User ID" required>
              </div>

              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                <div class="help-block text-right"><a href="">Forgot password ?</a></div>
              </div>

              <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary btn-block">Sign in</button>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> keep me logged-in
                </label>
              </div>
            </form>
          </div>
        </div>
      </li>
    </ul>
  </li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<?php
error_reporting(E_ERROR);
session_start();
include("http://localhost/proknap/functions.php");
$message="";
$user="root";
$p="";
$h="localhost";
$name=$_POST['name'];
$pwd=$_POST['password'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $db=mysqli_connect("localhost","$user","$p","proknap")
  or
  die("Unable to connect to MySQL");

  if(count($_POST)>0) {
    if($res=mysqli_query($db,"SELECT * FROM user where User_id='$name'")){

      $val=mysqli_fetch_array($res);

      $_SESSION["user_name"] = $_POST["name"];
      $_SESSION["auth"] = $val['Auth_id'];
      $_SESSION["dept"] =  $val['Dept_id'];
      $_SESSION['loggedin_time'] = time();
      if ($pwd == $val['password'])
      {
        if($val['Auth_id']==1)
        {
          header("Location: http://localhost/proknap/admin.php");
        }
        elseif ($val['Auth_id']==2){

          header("Location: http://localhost/proknap/procurementHead.php");
        }
        elseif($val['Auth_id']==3){

          header("Location: http://localhost/proknap/dealingOfficer.php");
        }
        elseif($val['Auth_id']==4)
        {
          header("Location: http://localhost/proknap/indentor1.php");
        }
        else 
        {
          $error = "Invalid Username or Password!";
        }
      }
  }

  echo "<p style='color:red; text-align:center;'><strong>Invalid Username or Password!</strong></p>";
}
}
?>

<div class="container-fluid bg-1 text-center">
  <div class="col-lg-12">
    <h1 class="pacifico white" style="text-shadow: 0 5px 5px #222;">proKnap</h1>
  </div>
  <p style="color:red; text-align:center;"><?php $error;?></p>
  <img src="http://localhost/proknap/logo.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3 class="pacifico white" style="text-shadow: 0 5px 5px #222;padding:30px;">Advancement through Technology</h3>
</div>

<footer class="container-f bg-4 text-center">
  <p>Welcome to proKnap Procurement Management System</p>
</footer>
</body>
</html>
