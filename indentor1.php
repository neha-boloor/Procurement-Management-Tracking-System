<!DOCTYPE html>
<html lang="en">
<head>
    <title>proKnap|Indentor</title>
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

    <style>
    body {
        position: relative;
    }
    ul.nav-pills {
        top: 100px;
        position: fixed;

    }
    a.left{
        background-color: gray;
        color: white;
    }
    div.col-sm-9 div {
        height: 950px;
        font-size: 18px;
        box-shadow: 0 2px 10px black;
    }
    #section1 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
    #section2 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}
    #section3 {color: #808080; background-color: #e3d6c6;font-family: Verdana, Geneva, sans-serif;}

    @media screen and (max-width: 810px) {
        #section1, #section2, #section3{
            margin-left: 150px;
        }
    }
    </style>
</head>



<body class="loggedin" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
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
                                $url = "http://localhost/proknap/login.php";
                                if(!isset($_SESSION['user_name']))
                                {
                                header("Location:$url");
                                }
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
                                if(isset($_SESSION['addReq'])){
                                    header("Refresh:2");
                                    unset($_SESSION['addReq']);
                                }

                                if(isset($_SESSION['eval'])){
                                    header("Refresh:2");
                                    unset($_SESSION['eval']);
                                }
                                ?>
                            </li>
                            <li></br></li>
                        </ul>
                    </li>
                    <li class="nav navbar-nav cuprum white font20"><a  name="logout" href="http://localhost/proknap/html/partials/logout.php">Logout</a></li>
                    <li class="nav navbar-nav cuprum white font20"><a href="http://localhost/proknap/help.php">Help</a></li>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <body data-spy="scroll" data-target="#myScrollspy" data-offset="20"  style="background-image:url(http://localhost/proknap/images/back.png)">

        <div class="container">
            <div class="row">
                <nav class="col-sm-3" id="myScrollspy">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a class="left" href="#section1">View PRs</a></li>
                        <li><a class="left" href="#section2">Add PR</a></li>
                        <li><a class="left" href="#section3">Update Tender Evaluation Report</a></li>
                    </ul>
                </nav>
                <div class="col-sm-9">
                    <div id="section1" style="padding-top:10px;">
                        <h1 style="margin-left:30px;">PRs</h1>
                        <p style="margin-left:30px;">
                            <object type="text/html" data="html/partials/do-view-card.php" width="800px" height="600px" style="overflow:auto;border:0px ridge blue;margin-left=30px">
                            </object></p>
                        </div>
                    </br></br>
                    <div id="section2" style="padding-top:10px;">
                        <h1 style="margin:30px;padding-top:30;">Add PR</h1>
                        <p style="margin-left=30p:;">
                            <object type="text/html" data="html/partials/add_req.php" width="800px" height="650px" style="overflow:auto;border:0px ridge blue">
                            </object>
                        </p>
                    </div>
                    <br/><br/>
                    <div id="section3" style="padding-top:10px;" height="500px">
                        <h1 style="margin:30px;padding-top:30;">Update Tender Evaluation Report</h1>
                        <p style="margin-left=30p:;">
                            <object type="text/html" data="html/partials/eval.php" width="800px" height="450px" style="overflow:auto;border:0px ridge blue">
                            </object>
                        </p>
                    </div>


                </div>
            </div>
        </div>

  </body>
  </html>
