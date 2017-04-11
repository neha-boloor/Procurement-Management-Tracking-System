<!DOCTYPE html>
<html lang="en">
<head>
  <title>proKnap|Dealing Officer</title>
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
  <style type="text/css">

  body {
    position: relative;
  }
  a{
    color:white;
  }

  a.left{
    background-color: gray;
  }
  ul.nav-pills {
    top: 100px;
    position: fixed;

  }
  div.col-sm-9 div {
    height: 950px;
    font-size: 18px;
    box-shadow: 0 2px 10px black;
  }
  #section1 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
  #section2 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
  #section3 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
  #section4 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
  #section5 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
  #section6 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}

  @media screen and (max-width: 810px) {
    #section1, #section2, #section3,#section4, #section5{
      margin-left: 150px;
    }
  }
  </style>
</head>

<?php
session_start();
$url = "http://localhost/proknap/login.php";
if(!isset($_SESSION['user_name']))
{
header("Location:$url");
}
if($_SERVER['REQUEST_METHOD']=="POST"){
  foreach ($_POST as $key => $value){
    echo "{$key} = {$value}\r\n";
  }
  header("Refresh:0");
}
?>

<body class="loggedin" data-spy="scroll" data-target="#myScrollspy" data-offset="20" style="background-image:url(http://localhost/proknap/images/back.png)">
  <nav class="navbar navbar-default navbar-inverse" role="navigation"style="box-shadow: 0 2px 10px black;">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="http://localhost/proknap/events.php" ><div style="font-size:25; font-family: 'Pacifico', cursive !important;">proKnap</div></a>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Logged In</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                    <?php
                    error_reporting(E_ERROR);
                    session_start();
                    echo $_SESSION['user_name'];
                    ?>
                </li>
                <li>
                    <?php
                    error_reporting(E_ERROR);
                    session_start();
                    include("http://localhost/proknap/functions.php");
                    $message="";
                    $user="root";
                    $p="";
                    $h="localhost";
                    if(isset($_SESSION['user_name'])){
                        $db=mysqli_connect("localhost","$user","$p","proknap")
                        or
                        die("Unable to connect to MySQL");

                        if(mysqli_select_db($db,"proknap"))
                        {
                            $sql = "SELECT Role from user join authorisation on user.Auth_id=authorisation.Auth_id where user.Auth_id=".$_SESSION['auth'];
                            if($res = mysqli_query($db,$sql)){
                                $val=mysqli_fetch_array($res);
                                echo $val['Role'];
                            }else{
                                echo "nope";
                            }
                        }
                        else
                        echo "not connected to db";
                    }
                    ?>
                </li>
                <li></br></li>
            </ul>
          </li>
          <li class="nav navbar-nav cuprum white font20"><a name="logout" href="http://localhost/proknap/html/partials/logout.php">Logout</a></li>
          <li class="nav navbar-nav cuprum white font20"><a href="http://localhost/proknap/help.php">Help</a></li>
        </ul>


      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="row">
      <nav class="col-sm-3" id="myScrollspy" >
        <ul class="nav nav-pills nav-stacked" style="font-weight:900;">
          <li class="active"><a class="left" href="#section1">Pending PRs</a></li>
          <li ><a name="completed" class="left" href="#section2" >Completed PRs</a></li-->
          <li ><a class="left" href="#section3" >Float Tenders</a></li>
          <li ><a class="left" href="#section4" >Add Extension Date</a></li>
          <li ><a class="left" href="#section5" >Change Tender Status</a></li>
          <li ><a class="left" href="#section6" >Select Final Tender</a></li>


        </ul>
      </nav>
      <div class="col-sm-9">
        <div id="section1">
          <h1 style="margin-left:20px;margin-top:30px;padding-top:30px;">Pending PRs</h1>
          <p style="margin-left:20px;margin-top:10px;">
            <object type="text/html" data="html/partials/view_pend.php" width="800px" height="600px" style="overflow:auto;border:0px ridge blue">
            </object>
          </p>
        </div>
        <div id="section2">
          <h1 style="margin-left:20px;margin-top:50px; padding-top:30px;">Completed PRs</h1>
          <p>
            <object type="text/html" data="html/partials/view_done.php" width="800px" height="600px" style="overflow:auto;border:0px ridge blue">
            </object>
          </p>
        </div>
        <div id="section3" style="height:800px;">
          <h1 style="margin-left:20px;margin-top:50px; padding-top:30px;">Float Tenders</h1>
          <p>
              <object type="text/html" data="html/partials/do-float.php" width="800px" height="650px" style="overflow:auto;border:0px ridge blue">
              </object>
            </p>
          </div>
          <div id="section4" style="height:600px;">
            <h1 style="margin-left:20px;margin-top:50px; padding-top:30px;">Add Extention Dates</h1>
            <p>
              <object type="text/html" data="html/partials/add-extension-date.php" width="800px" height="500px" style="overflow:auto;border:0px ridge blue">
              </object>
            </p>
          </div>
          <div id="section5" style="height:600px;">
            <h1 style="margin-left:20px;margin-top:50px; padding-top:30px;">Change Status</h1>
            <p>
              <object type="text/html" data="html/partials/change-status.php" width="800px" height="500px" style="overflow:auto;border:0px ridge blue">
              </object>
            </p>
          </div>
          <div id="section6" style="height:600px;">
            <h1 style="margin-left:20px;margin-top:50px; padding-top:30px;">Finalise</h1>
            <p>
              <object type="text/html" data="html/partials/finalise.php" width="800px" height="500px" style="overflow:auto;border:0px ridge blue">
              </object>
            </p>
          </div>

        </br>
      </br>

    </div>
  </div>
</div>

</body>
</html>
