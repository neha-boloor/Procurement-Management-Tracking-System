<!--navbar div-->
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="icon" href="images/logo-png.png" type="image/png">
 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <link href="css/custom.css" rel="stylesheet">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <link href='https://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="loginstyle.css">
</head>
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
        				<li><a href="login.html">Home</a></li>
        				<li><a href="#">IT</a></li>
        				<li><a href="#">Finance</a></li>
        				<li><a href="#">Electrical</a></li>
        				<li><a href="#">Mechanical</a></li>
        				</ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
          <li>
             <div class="row">
                <div class="col-md-12">

                   <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                      <div class="form-group">
                         <label class="sr-only" for="exampleInputEmail2">User ID</label>
                         <input type="text" class="form-control" id="exampleInputEmail2" placeholder="User ID" required>
                      </div>

                      <div class="form-group">
                         <label class="sr-only" for="exampleInputPassword2">Password</label>
                         <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                               <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                      </div>

                      <div class="form-group">
                         <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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
