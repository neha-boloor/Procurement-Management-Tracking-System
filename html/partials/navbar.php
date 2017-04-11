<!--navbar div-->
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="images/logo-png.png" type="image/png">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="loginstyle.css">
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

  if(mysqli_select_db($db,"proknap"))
  echo"connected to db";
  else
  echo "not";
    echo $name;
  if(count($_POST)>0) {
    if($res=mysqli_query($db,"SELECT * FROM user where User_id='$name'")){

      $val=mysqli_fetch_array($res);

      $_SESSION["user_name"] = $_POST["name"];
      $_SESSION["auth"] = $val['Auth_id'];
      $_SESSION["dept"] =  $val['Dept_id'];
      $_SESSION['loggedin_time'] = time();
      if($val['Auth_id']==1)
      {
        header("Location: http://localhost/proknap/indentor1.php");
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
      else {
        $message = "Invalid Username or Password!";
      }
  }
/*
  if(isset($_SESSION["user_id"])) {
    if(!isLoginSessionExpired()) {
      header("Location:http://localhost/proknap/dealingOfficer.html");
    } else {
      header("Location:http://localhost/proknap/dealingOfficer.html");
    }
  }

  if(isset($_POST["session_expired"])) {
    $message = "Login Session is Expired. Please Login Again";
}*/
}
}
?>

<div class="container-fluid">
    <nav class="navbar navbar-inverse navbar-fixed-top" id="navigation" style="box-shadow: 0 2px 10px black;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar" style="color:#fff"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand pacifico white">
                proKnap
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav cuprum white font20">
                <li>&nbsp;&nbsp;&nbsp;</li>
                <li><a href="http://localhost/proknap/login.php">Home</a></li>
                <li><a href="http://localhost/proknap/it.php">IT</a></li>
                <li><a href="http://localhost/proknap/finance.php">Finance</a></li>
                <li><a href="http://localhost/proknap/electrical.php">Electrical</a></li>
                <li><a href="http://localhost/proknap/mech.php">Mechanical</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
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
                                            <div class="help-block text-right"><a href="">Forget the password ?</a></div>
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
                <li>&nbsp;&nbsp;&nbsp;</li>
                <li>&nbsp;&nbsp;&nbsp;</li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>
<!--navbar div end-->
