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
a{
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
error_reporting();
session_start();
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST" and(isset($_POST['submit1']))){
  $_SESSION['tender']=True;
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }


  $sql = "INSERT INTO tender ". "VALUES('$_POST[tender_id]',STR_TO_DATE('$_POST[tender_date]', '%Y-%m-%d'),STR_TO_DATE('$_POST[bid_open_date]', '%Y-%m-%d'),'$_POST[pr_no]',$_POST[status],STR_TO_DATE('$_POST[last_updated]', '%Y-%m-%d'))";

  $retval = mysqli_query( $conn,$sql);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "\t\tEntered data successfully\n";

  mysqli_close($conn);
  header("Refresh:0");
}

if($_SERVER['REQUEST_METHOD']=="POST" and(isset($_POST['submit2']))){
  $_SESSION['tender']=True;
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }

  if(isset($_POST['status2']) and $_POST['status2']!=""){
    echo "stat";
    $sql1 = "UPDATE tender SET Status_id="."'$_POST[status2]'"." WHERE T_id="."'$_POST[tid]'";
    $retval1 = mysqli_query( $conn,$sql1);
    if(! $retval1 ) {
      $msg = "'\t\tCould not update status of Tender.\n'";
    }else{
      $msg = "\t\tStatus successfully modified.\n";
    }
  }

  if (isset($_POST['ext1']) and $_POST['ext1']!="") {
    echo "ext1";
    $sql2 = "select * from ext1 where "."'$_POST[tid]'"."=T_id";
    $retval2 = mysqli_query( $conn,$sql2);
    if($retval2->num_rows !== 0) {
      $msg = "\t\tDate already extended once. \nKindly enter in next column.\n";
    }else{
      $sql2 = "insert into ext1 values ("."'$_POST[tid]'".","."'$_POST[ext1]'".")";
      $retval2 = mysqli_query( $conn,$sql2);
      if($retval2){
      $msg =  "\t\tDate successfully extended.\n";
      }
    }
  }

  if (isset($_POST['ext2']) and $_POST['ext2']!="") {
    echo "ext2";
    $sql3 = "select * from ext2 where '$_POST[tid]'=T_id";
    $retval3 = mysqli_query( $conn,$sql3);
    if($retval3->num_rows !== 0) {
      $msg = "'\t\tDate cannot be extended further.\n'";
    }else{
      $sql3 = "insert into ext2 values ("."'$_POST[tid]'".","."'$_POST[ext2]'".")";
      $retval3 = mysqli_query( $conn,$sql3);
      if($retval3){
      $msg =  "\t\tDate successfully extended.\n";
      }
    }
  }

    header("Refresh:0");
    header("Refresh:0");
}

?>

<body>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <hr>
  <div class="container bootstrap snippet" style="width:800px; height:250px;">
    <div class="row" style="width:800px; height:250px;">
      <div class="col-lg-12" style="width:800px; height:250px;">
        <div class="main-box no-header clearfix" style="width:800px; height:250px;">
          <div class="main-box-body clearfix" style="width:800px; height:250px;">
            <div class="table-responsive" style="width:800px; height:250px;">
              <form action="do-enter-tender.php" method="post">
                <table class="table user-list">
                  <thead>
                    <tr>
                      <th><span>Tender ID</span></th>
                      <th><span>Tender Date</span></th>
                      <th><span>Bid Open Date</span></th>
                      <th><span>PR Number</span></th>
                      <th><span>Last Updated</span></th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="text" name="tender_id"/>
                      </td>
                      <td>
                        <input type="text" name="tender_date"/>
                      </td>
                      <td>
                        <input type="text" name="bid_open_date"/>
                      </td>
                      <td>
                        <input type="text" name="pr_no"/>
                      </td>
                      <td>
                        <input type="text" name="last_updated"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <p align="center">
                  <select name="status">
                    <option value="">Select Status</option>
                    <option value="1">Evaluation Sent Date</option>
                    <option value="2">Evaluation Received date</option>
                    <option value="3">Approval for Price bid Opening Sent date</option>
                    <option value="4">Received from Finance date</option>
                    <option value="5">Award approval sent date</option>
                    <option value="6">Award approval received date</option>
                    <option value="7">PO Date</option>
                  </select>
                </p>
              </br>
              <button type="submit" name="submit1" style="margin:auto; display:block;color:black;text-transform: uppercase;
              font-size: 0.675em;text-align:center;font-family:'Book Antiqua'; font-weight:400">Submit</button>
            </br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<hr>
<h1 style="margin-left:20px; color:#808080;">Edit Tenders</h1>
<hr>
<?php echo "$msg"; ?>
<div class="container bootstrap snippet" style="width:800px;">
  <div class="row" style="width:800px;">
    <div class="col-lg-12" style="width:800px;">
      <div class="main-box no-header clearfix" style="width:800px;">
        <div class="main-box-body clearfix" style="width:800px;">
          <div class="table-responsive" style="width:800px;">
            <form action="do-enter-tender.php" method="post">
              <table class="table user-list">
                <thead>
                  <tr>
                    <th>Tender Id</th>
                    <th>Status</th>
                    <th>Extension date 1</th>
                    <th>Extension date 2</th>
                  </tr>
                </thead>
                <tbody>
                  <td><input name="tid"/></td>
                  <td>
                    <select name="status2">
                      <option value="">Select Status</option>
                      <option value="1">Evaluation Sent Date</option>
                      <option value="2">Evaluation Received date</option>
                      <option value="3">Approval for Price bid Opening Sent date</option>
                      <option value="4">Received from Finance date</option>
                      <option value="5">Award approval sent date</option>
                      <option value="6">Award approval received date</option>
                      <option value="7">PO Date</option>
                    </select>
                  </td>
                  <td><input name="ext1"/></td>
                  <td><input name="ext2"/></td>
                </tbody>
              </table>
              <button type="submit" name="submit2" style="margin:auto; display:block;color:black;text-transform: uppercase;
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
<script type="text/javascript">

</script>
</body>
</html>
