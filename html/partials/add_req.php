<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <!--
  The codes are free, but we require linking to our web site.
  Why to Link?
  A true story: one girl didn't set a link and had no decent date for two years, and another guy set a link and got a top ranking in Google!
  Where to Put the Link?
  home, about, credits... or in a good page that you want
  THANK YOU MY FRIEND!
-->
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
if($_SERVER['REQUEST_METHOD']=="POST" and(isset($_POST['submit1']))){
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }


  $sql = "INSERT INTO request ". "VALUES('$_SESSION[user_name]','$_POST[req_id]','$_POST[descr]','Pending',STR_TO_DATE('$_POST[last_updated]', '%Y-%m-%d'),'$_POST[item]','$_POST[qty]')";

  $retval = mysqli_query( $conn,$sql);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "\t\tEntered data successfully\n";

  mysqli_close($conn);
  header("Refresh:0");
  header("Refresh:0");
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
                      <th><span>Request ID</span></th>
                      <th><span>Item</span></th>
                      <th><span>Quantity</span></th>
                      <th><span>Description</span></th>
                      <th><span>Last Updated</span></th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="text" name="req_id"/>
                      </td>
                      <td>
                        <input type="text" name="item"/>
                      </td>
                      <td>
                        <input type="text" name="qty"/>
                      </td>
                      <td>
                        <input type="text" name="descr"/>
                      </td>
                      <td>
                        <input type="text" name="last_updated"/>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </br>
              <button type="submit" name="submit1" style="margin:auto; display:block;color:black;text-transform: uppercase;
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