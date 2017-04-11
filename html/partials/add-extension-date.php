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
<body>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <hr>
    <div class="container bootstrap snippet" style="width:800px;">
        <div class="row" style="width:800px;">
            <div class="col-lg-12" style="width:800px;">
                <div class="main-box no-header clearfix" style="width:800px;">
                    <div class="main-box-body clearfix" style="width:800px;">
                        <div class="table-responsive" style="width:800px;">
                            <form action="add-extension-date.php" method="post">
                                <table class="table user-list">
                                    <thead>
                                        <tr><th colspan="6">Extension Date 1</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <select name="req_id" >
                                                <?php
                                                session_start();
                                                $db = new mysqli('localhost', 'root');
                                                if ($db->connect_errno) {
                                                    echo 'Connect failed: '.$db->connect_error;
                                                    exit();
                                                }
                                                $db->select_db('proknap');
                                                $cursor = $db->query("SELECT DISTINCT tender.Pr_no from tender,assign where tender.Pr_no=assign.Pr_no and assign.DO='$_SESSION[user_name]'");
                                                if ($db->error) {
                                                    echo $db->error.PHP_EOL;
                                                }
                                                //echo "<select>";

                                                echo "<option value=0>Select PR Number </option>";
                                                if($cursor){
                                                while($val = $cursor->fetch_assoc()){
                                                    echo "<option value=".$val['Pr_no'].">".$val['Pr_no']."</option>";
                                                 }
                                                }
                                                ?>
                                             </select>

                                            </td>
                                            <td>
                                            <input name="submit3" type="submit" style="width="100px";color:black;text-transform: uppercase;text-align:center;" value="Show Tenders"></input>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <select name="tid1" >
                                                <?php
                                                    session_start();
                                                    if(isset($_POST['submit3']))
                                                    {
                                                        $_SESSION['pr'] = $_POST['req_id'];
                                                        $db = new mysqli('localhost', 'root');
                                                        if ($db->connect_errno) {
                                                            echo 'Connect failed: '.$db->connect_error;
                                                            exit();
                                                        }
                                                        $db->select_db('proknap');
                                                        $cursor = $db->query( "SELECT T_id from tender where Pr_no=$_POST[req_id] and T_id not in (SELECT T_id from ext1 where Pr_no=$_POST[req_id])");
                                                        if ($db->error) {
                                                            echo $db->error.PHP_EOL;
                                                        }
                                                        //echo "<select>";

                                                        echo "<option value=0>Select Tender Number </option>";
                                                        if($cursor){
                                                        while($val = $cursor->fetch_assoc()){
                                                            echo "<option value=".$val['T_id'].">".$val['T_id']."</option>";
                                                         }
                                                        }
                                                    }
                                                ?>
                                             </select>

                                            </td>
                                            <td><input name="ext1" size="20"/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                </table>
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

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<hr>
<div class="container bootstrap snippet" style="width:800px;">
    <div class="row" style="width:800px;">
        <div class="col-lg-12" style="width:800px;">
            <div class="main-box no-header clearfix" style="width:800px;">
                <div class="main-box-body clearfix" style="width:800px;">
                    <div class="table-responsive" style="width:800px;">
                        <form action="add-extension-date.php" method="post">
                            <table class="table user-list">
                                <thead>
                                    <tr><th colspan="6">Extension Date 2</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                        <select name="req_id" >
                                            <?php
                                            session_start();
                                            $db = new mysqli('localhost', 'root');
                                            if ($db->connect_errno) {
                                                echo 'Connect failed: '.$db->connect_error;
                                                exit();
                                            }
                                            $db->select_db('proknap');
                                            $cursor = $db->query("SELECT DISTINCT tender.Pr_no from tender,assign where tender.Pr_no=assign.Pr_no and assign.DO='$_SESSION[user_name]'");
                                            if ($db->error) {
                                                echo $db->error.PHP_EOL;
                                            }
                                            //echo "<select>";

                                            echo "<option value=0>Select PR Number </option>";
                                            if($cursor){
                                            while($val = $cursor->fetch_assoc()){
                                                echo "<option value=".$val['Pr_no'].">".$val['Pr_no']."</option>";
                                             }
                                            }
                                            ?>
                                         </select>

                                        </td>
                                        <td>
                                        <input name="submit2" type="submit" style="width="100px";color:black;text-transform: uppercase;text-align:center;" value="Show Tenders"></input>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <select name="tid2" >
                                            <?php
                                                session_start();
                                                if(isset($_POST['submit2']))
                                                {
                                                    $_SESSION['pr'] = $_POST['req_id'];
                                                    $db = new mysqli('localhost', 'root');
                                                    if ($db->connect_errno) {
                                                        echo 'Connect failed: '.$db->connect_error;
                                                        exit();
                                                    }
                                                    $db->select_db('proknap');
                                                    $cursor = $db->query("SELECT T_id from ext1 where Pr_no=$_POST[req_id] and T_id not in (SELECT T_id from ext2 where Pr_no=$_POST[req_id]) ");
                                                    if ($db->error) {
                                                        echo $db->error.PHP_EOL;
                                                    }
                                                    //echo "<select>";

                                                    echo "<option value=0>Select Tender Number </option>";
                                                    if($cursor){
                                                    while($val = $cursor->fetch_assoc()){
                                                        echo "<option value=".$val['T_id'].">".$val['T_id']."</option>";
                                                     }
                                                    }
                                                }
                                            ?>
                                         </select>

                                        </td>
                                        <td><input name="ext2" size="20"/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                            </table>
                            <button type="submit" name="submit4" style="margin:auto; display:block;color:black;text-transform: uppercase;text-align:center;
                            font-size: 0.8em;font-family:'Book Antiqua'; font-weight:400">Submit</button>
                        </br></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
error_reporting(E_ERROR);
session_start();
if(isset($_POST['submit1'])){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }
    $sql = "insert into ext1 values ($_SESSION[pr],$_POST[tid1],(SELECT STR_TO_DATE('$_POST[ext1]', '%Y-%m-%d')))";

    $retval = mysqli_query( $conn,$sql);

    if(! $retval ) {
        die('Could not enter data into ext2: ' . mysql_error());
    }

    echo "\t\tEntered data successfully\n";
    unset($_SESSION[pr]);
    mysqli_close($conn);
    header("Refresh:2");
}

if((isset($_POST['submit4']))){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }
    $sql = "insert into ext2 values ($_SESSION[pr],$_POST[tid2],(SELECT STR_TO_DATE('$_POST[ext2]', '%Y-%m-%d')))";

    $retval = mysqli_query( $conn,$sql);

    if(! $retval ) {
        die('Could not enter data into ext2: ' . mysql_error());
    }

    echo "\t\tEntered data successfully\n";
    unset($_SESSION[pr]);
    mysqli_close($conn);
    header("Refresh:2");
}
?>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
