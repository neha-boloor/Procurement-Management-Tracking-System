<html ng-app="myApp">

<head>
    <title>
    About Us| proKnap
    </title>
    <meta name="author" content="proKnap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="icon" href="images/logo-png.png" type="image/png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/libs/angular/angular.min.js"></script>
    <script src="js/libs/angular/angular-route.min.js"></script>
    <script src="js/libs/angular/angular-resource.min.js"></script>
    <script src="js/libs/jquery/jquery-2.1.3.min.js"></script>
    <script src="js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="js/scripts/ng/app.js"></script>
    <script src="js/scripts/ng/eventCtrl.js"></script>
</head>

<?php
    error_reporting(E_ERROR);
    session_start();
    if(isset($_SESSION['user_name'])){
        $nav="'http://localhost/proknap/html/partials/navbarLogged.php'";
    }else{
        $nav="'http://localhost/proknap/html/partials/navbar.php'";
    }
 ?>

<body >
    <section id="navbar" ng-include="<?php echo $nav;?>"></section>
    <section id="about" ng-include="'http://localhost/proknap/html/partials/events.php'"></section>
    <section id="footer" ng-include="'http://localhost/proknap/html/partials/footer.php'"></section>
</body>

</html>
