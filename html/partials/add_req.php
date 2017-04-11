<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

<title>table user list - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
<style type="text/css">
body{
  background:#e3d6c6;
}
.main-box.no-header {
  padding-top: 20px;
}
.main-box {
  background: #FFFFFF;
  -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
  -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
  -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
  -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
  box-shadow: 1px 1px 2px 0 #CCCCCC;
  margin-bottom: 16px;
  -webikt-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
.table a.table-link.danger {
  color: #e74c3c;
}
.label {
  border-radius: 3px;
  font-size: 0.875em;
  font-weight: 600;
}
.user-list tbody td .user-subhead {
  font-size: 0.875em;
  font-style: italic;
}
.user-list tbody td .user-link {
  display: block;
  font-size: 1.25em;
  padding-top: 3px;
  margin-left: 60px;
}
a {
  color: #3498db;
  outline: none!important;
}

.table thead tr th {
  text-transform: uppercase;
  font-size: 0.875em;
  text-align:center;
  vertical-align: middle;
}
.table thead tr th {
  border-bottom: 3px solid #e7ebee;
}

.table tbody tr td {
  font-size: 0.875em;
  vertical-align: middle;
  border-top: 1px solid #e7ebee;
  padding: 12px 8px;
  text-align: center; /* center checkbox horizontally */
}
.table tbody tr td input{
  width:100%;
  vertical-align: center;
}

</style>
</head>

<?php

session_start();
if($_SERVER['REQUEST_METHOD']=="POST" and(isset($_POST['submit11']))){
  $_SESSION['addReq'] = 'true';
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');
  $user=$_SESSION['user_name'];
  $dept=$_SESSION['dept'];
  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }

  $sql = "INSERT INTO pr (Pr_date,Dept,Item,Descr,Quantity) VALUES ( (SELECT CURDATE()), $dept, '$_POST[item]', '$_POST[descr]', '$_POST[qty]')";
  $retval = mysqli_query( $conn,$sql);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "\t\tEntered data successfully\n";

  mysqli_close($conn);
  header("Refresh:2");
  //header("Refresh:0");
}


?>

<body>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-box no-header clearfix">
          <div class="main-box-body clearfix">
            <div class="table-responsive">
              <form action="add_req.php" method="post">
                <table class="table user-list">
                  <thead>
                    <tr>

                      <th><span>Item</span></th>
                      <th><span>Quantity</span></th>
                      <th><span>Description</span></th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="text" name="item"/>
                      </td>
                      <td>
                        <input type="text" name="qty"/>
                      </td>
                      <td>
                        <input type="text" name="descr"/>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </br>
              <button type="submit" name="submit11" style="margin:auto; display:block;color:black;text-transform: uppercase;
              font-size: 0.675em;text-align:center;font-family:'Book Antiqua'; font-weight:400">Submit</button>
            </br></br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>





<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>
