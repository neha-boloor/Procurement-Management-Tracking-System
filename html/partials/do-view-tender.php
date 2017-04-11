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
    /*padding-top: 20px;*/
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

  a {
    color: #3498db;
    outline: none!important;
  }


  .table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
    text-align:center;
  }
  .table thead tr th {
    border-bottom: 2px solid #e7ebee;
    color:black;
  }
  .table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
    color:black;
  }
  .table tbody tr td {
    color:black;
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
  }
  </style>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <hr>
  <div class="container bootstrap snippet" style="width:800px; height:600px;">
    <div class="row" style="width:800px; height:600px;">
      <div class="col-lg-12" style="width:800px; height:600px;">
        <div class="main-box no-header clearfix" style="width:800px; height:600px;">
          <div class="main-box-body clearfix" style="width:800px; height:600px;">
            <div class="table-responsive" style="width:800px; height:600px;">
              <table class="table user-list">
                <thead>
                  <tr>
                    <th><span>Tender ID</span></th>
                    <th><span>Tender Date</span></th>
                    <th><span>Bid Open Date</span></th>
                    <th><span>PR number</span></th>
                    <th><span>Status</span></th>
                    <th class="text-center"><span>Last Updated</span></th>
                    <th><span>Exntended date 1</span></th>
                    <th><span>Exntended date 2</span></th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  session_start();
                  if(isset($_SESSION['tender'])){
                    header("Refresh:0");
                  }
                  error_reporting(E_ERROR);
                  $db = new mysqli('localhost', 'root');
                  if ($db->connect_errno) {
                    echo 'Connect failed: '.$db->connect_error;
                    exit();
                  }
                  $db->select_db('proknap');
                  $cursor = $db->query("SELECT * FROM tender");
                  if ($db->error) {
                    echo $db->error.PHP_EOL;
                  }
                  $meta_query_result = [];
                  while($val = $cursor->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$val['T_id']."</td>";
                    //echo "<td>".$val['Pr_no']."</td>";
                    echo "<td>".$val['Tdate']."</td>";
                    echo "<td>".$val['Bid_open_date']."</td>";
                    $res=mysqli_query($db,"SELECT Last_updated FROM tender where Pr_no=".$val[Pr_no]);
                    $val2=mysqli_fetch_array($res);
                    echo "<td>".$val2['Last_updated']."</td>";
                    $sql4 = "SELECT Descr FROM tender join status on tender.Status_id = status.Status_id where tender.Status_id=".$val[Status_id];
                    //$res=mysqli_query($db,"SELECT Descr FROM status where Status_id = ".$val[Status_id]);
                    $res=mysqli_query($db,$sql4);
                    $val2=mysqli_fetch_array($res);
                    $status_id=mysqli_query($db,"SELECT Status_id from tender t where t.Pr_no=".$val[Pr_no]);
                    $val3=mysqli_fetch_array($status_id);
                    switch ($val3['Status_id']){
                      case 2:
                      case 3:

                      case 4:
                      echo "<td>"."<span class='label label-success'>".$val2['Descr']."</span>"."</td>";
                      break;

                      case 1:
                      case 5:
                      echo "<td>"."<span class='label label-danger'>".$val2['Descr']."</span>"."</td>";
                      break;

                      case 6:
                      echo "<td>"."<span class='label label-default'>".$val2['Descr']."</span>"."</td>";
                      break;

                      case 7:
                      echo "<td>"."<span class='label label-danger'>".$val2['Descr']."</span>"."</td>";
                      break;

                      default:
                      echo "Error";
                    }
                    echo "<td>".$val['Last_updated']."</td>";
                    $status_id=mysqli_query($db,"SELECT Ext_date1 from ext1 e where e.T_id=".$val['T_id']);
                    $val3=mysqli_fetch_array($status_id);
                    echo "<td>".$val3['Ext_date1']."</td>";
                    $status_id=mysqli_query($db,"SELECT Ext_date2 from ext2 e where e.T_id=".$val['T_id']);
                    $val3=mysqli_fetch_array($status_id);
                    echo "<td>".$val3['Ext_date2']."</td>";
                    echo "</tr>";
                  }
                  $cursor->close();

                  header("Refresh:2");
                  ?>
                  <script>
                      window.opener.location.reload();
                  </script>
                </tbody>
              </table>
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
