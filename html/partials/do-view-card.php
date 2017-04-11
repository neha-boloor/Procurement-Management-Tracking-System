<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>table user list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
                                            <th><span>PR No.</span></th>
                                            <th><span>Description</span></th>
                                            <th><span>Item</span></th>
                                            <th><span>Quantity</span></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        error_reporting(E_ERROR|E_PARSE);
                                        session_start();
                                        $user=$_SESSION['user_name'];
                                        $db = new mysqli('localhost', 'root');
                                        if ($db->connect_errno) {
                                            echo 'Connect failed: '.$db->connect_error;
                                            exit();
                                        }
                                        $db->select_db('proknap');
                                        if ($db->error) {
                                            echo $db->error.PHP_EOL;
                                        }
                                        //echo "hello4";
                                        $dept=$_SESSION['dept'];
                                        //echo "$dept";
                                        $cursor = $db->query("SELECT * FROM pr where Dept = $dept");
                                        //echo "hello3";
                                        if($cursor)
                                        {   //echo "hello1";
                                            while($val = $cursor->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td style='text-align:center;'>".$val['Pr_no']."</td>";
                                            //echo "<td>".$val['Pr_no']."</td>";
                                            echo "<td style='text-align:center;'>".$val['Descr']."</td>";
                                            echo "<td style='text-align:center;'>".$val['Item']."</td>";
                                            echo "<td style='text-align:center;'>".$val['Quantity']."</td>";
                                        echo "</tr>";
                                    }
                                }
                                if($cursor)
                                    $cursor->close();
                                    ?>
                                </tbody>
                            </table>
                            <div align="center">
                            <form method="post" action="do-view-card.php">

                                    <select name="indent_view" id="indent_view">
                                        <option value="0">Select PR Number to view its status</option>
                                        <?php error_reporting(E_ERROR|E_PARSE);
                                        $db = new mysqli('localhost', 'root');
                                        if ($db->connect_errno) {
                                            echo 'Connect failed: '.$db->connect_error;
                                            exit();
                                        }
                                        $db->select_db('proknap');
                                        $dept=$_SESSION['dept'];
                                        $cursor = $db->query("SELECT * FROM PR where Dept = $dept");
                                        if ($db->error) {
                                            echo $db->error.PHP_EOL;
                                        }
                                        while($val = $cursor->fetch_assoc()){
                                            echo "<option value=".$val['Pr_no'].">".$val['Pr_no']."</option>";
                                        }
                                        ?>
                                    </select>

                                    <input type="submit" name="submit1" style="margin:auto;color:black;
                                     font-size: 0.675em;font-family:'Book Antiqua'; font-weight:400"></input>

                            </form>
                            </div>
                    <?php
                    error_reporting(E_ERROR);
                    session_start();
                    if((isset($_POST['submit1']))){

                        $db = new mysqli('localhost', 'root');
                        if ($db->connect_errno) {
                            echo 'Connect failed: '.$db->connect_error;
                            exit();
                        }
                        $db->select_db('proknap');

                        $cursor1 = $db->query("SELECT Pr_no from tender where Pr_no=".$_POST['indent_view']);
                        $cursor2 = $db->query("SELECT Pr_no from assign where Pr_no=".$_POST['indent_view']);
                        if ($db->error) {
                            echo $db->error.PHP_EOL;
                        }
                        //echo "<select name="."req_id".">";
                        //echo $_POST['indent_view'];
                        //echo $cursor1;
                        if($cursor1->fetch_assoc()){
                            //echo "hi1";
                            echo "<br/><br/><table border='1' align='center'>";
                            echo "<th style='text-align:center;'>Tender Id</th>";
                            echo "<th style='text-align:center;'>Status</th>";
                            echo "<th style='text-align:center;'>Status updated date</th>";
                        $cursor = $db->query("SELECT Pr_no,T_id,status.Descr,Status_updated_date from tender join status on tender.Status=status.Status_id where Pr_no=".$_POST['indent_view']);
                        while($val = $cursor->fetch_assoc()){
                            //echo "hi11";

                            echo "<tr>";
                            echo "<td style='text-align:center;'>".$val['T_id']."</td>";
                            echo "<td style='text-align:center;'>".$val['Descr']."</td>";
                            echo "<td style='text-align:center;'>".$val['Status_updated_date']."</td>";
                            echo "</tr>";
                        }
                        }
                        else if($cursor2->fetch_assoc())
                        {
                            //echo "hi2";
                            echo "<br/><br/><table border='1' align='center'>";
                            echo "<th style='text-align:center;'>Pr No</th>";
                            echo "<th style='text-align:center;'>Status</th>";
                            echo "<tr>";
                            echo "<td style='text-align:center;'>".$_POST['indent_view']."</td>";
                            echo "<td style='text-align:center;'>"."PR Approved"."</td>";
                            echo "</tr>";
                        }
                        else
                        {
                            //echo "hi3";
                            echo "<br/><br/><table border='1' align='center'>";
                            echo "<th style='text-align:center;'>Pr No</th>";
                            echo "<th style='text-align:center;'>Status</th>";
                            echo "<tr>";
                            echo "<td style='text-align:center;'>".$_POST['indent_view']."</td>";
                            echo "<td style='text-align:center;'>"."PR pending"."</td>";
                            echo "</tr>";
                        }
                    }
                        echo "</table>"
                        ?>
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
