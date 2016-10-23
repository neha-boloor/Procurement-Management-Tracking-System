<!DOCTYPE html>
<html lang="en">
<head>
  <title>proKnap|Dealing Officer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
  <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="image/png" rel="icon" href="https://localhost/proknap/images/logo-png.png" >
  <link type="text/css" href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" href="https://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="https://localhost/proknap/css/custom.css" rel="stylesheet">
  <link type="text/css" href="https://localhost/proknap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="https://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href='https://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="https://localhost/proknap/loginstyle.css">
=======
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" href="images/logo-png.png" type="image/png">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
>>>>>>> ca9b3b076bc60368522d71772a1e72a3d9af68a5
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="loginstyle.css">
  <style type="text/css">

  <style>
  body {
    position: relative;
  }
  a{
    color:white;
  }
  ul.nav-pills {
    top: 100px;
    position: fixed;

  }
  div.col-sm-9 div {
    height: 450px;
    font-size: 18px;
    box-shadow: 0 2px 10px black;
  }
  #section1 {color: #fff; background-color: #e3d6c6;}
  #section2 {color: #fff; background-color: #edd5d1;}


  @media screen and (max-width: 810px) {
    #section1, #section2{
      margin-left: 150px;
    }
  }
  </style>
</head>
<body class="loggedin" data-spy="scroll" data-target="#myScrollspy" data-offset="20" style="background-color:#ff8c00">
  <nav class="navbar navbar-default navbar-inverse" role="navigation"style="box-shadow: 0 2px 10px black;">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="events.html" ><div style="font-size:25; font-family: 'Pacifico', cursive !important;">proKnap</div></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cuprum white font20">

          <li><a href="it.html">IT</a></li>
          <li><a href="finance.html">Finance</a></li>
          <li><a href="electrical.html">Electrical</a></li>
          <li><a href="mech.html">Mechanical</a></li>

        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Logged In</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">   <li><a href="#">Function1</a></li>
              <li><a href="#">Function2</a></li>
              <li><a href="#">Function3</a></li>
              <li><a href="#">Function4</a></li>
              <li></br></li>
            </ul>
          </li>
          <li class="nav navbar-nav cuprum white font20"><a href="#">Logout</a></li>
        </ul>


      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="row">
      <nav class="col-sm-3" id="myScrollspy" >
        <ul class="nav nav-pills nav-stacked" style="font-weight:900;">
          <li class="active"><a href="#section1">Enter New Tender</a></li>

        </ul>
      </nav>
      <div class="col-sm-9">
        <div id="section1">
          <h1 style="margin-left:20px;margin-top:30px;padding-top:30px;">Enter Tender Details</h1>
          <p style="margin-left:20px;margin-top:10px;">
            <form method="post" action="#">
            <object type="text/html" data="html/partials/do-enter-tender.html" width="800px" height="250px" style="overflow:auto;border:0px ridge blue">
            </object>
            <div style="text-align:center;box-shadow: 0 0px 0px black;">
            <input type="submit"/>
          </div>
          </form>
          </p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
