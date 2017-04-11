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
    if($_SESSION["auth"]==1)
    {
        $url = "http://localhost/proknap/admin.php";
    }
    elseif ($_SESSION["auth"]==2){

        $url = "http://localhost/proknap/procurementHead.php";
    }
    elseif($_SESSION["auth"]==3){

        $url = "http://localhost/proknap/dealingOfficer.php";
    }
    elseif($_SESSION["auth"]==4)
    {
        $url = "http://localhost/proknap/indentor1.php";
    }
    else {

    }
?>

<nav class="navbar navbar-default navbar-inverse" role="navigation"style="box-shadow: 0 2px 10px black;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" hack href=<?php echo $url;?>><div style="font-size:25; font-family: 'Pacifico', cursive !important;">proKnap</div></a>
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
                                echo $_SESSION['user_name'];
                            }
                            else
                            echo "not connected to db";
                            }
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
                                        //echo $_SESSION['user_name'];
                                        if($_SESSION['auth']==1)
                                            echo "Admin";
                                        elseif ($_SESSION['auth']==2)
                                            echo "Procurement Head";
                                        elseif ($_SESSION['auth']==3)
                                            echo "Dealing Officer";
                                        elseif ($_SESSION['auth']==4)
                                            echo "Indentor";
                                    }
                                    else
                                    echo "not connected to db";
                                    }
                                        ?>
                            </li>
                            <li></br></li>
                        </ul>
                    </li>
                    <li class="nav navbar-nav cuprum white font20"><a href="http://localhost/proknap/html/partials/logout.php">Logout</a></li>
                    <li class="nav navbar-nav cuprum white font20"><a href="http://localhost/proknap/html/partials/help.php">Help</a></li>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<!--navbar div end-->
