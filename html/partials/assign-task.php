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

<?php

session_start();
if($_SERVER['REQUEST_METHOD']=="POST" and(isset($_POST['submit2']))){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');
    $date = date("Y-m-d");

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }
    //echo $_POST['do']."</br>".$_POST['req_id'];
    $req = (int)$_POST['req_id'];
    $sql = "insert into assign values($req,'$_POST[do]')";

    $retval = mysqli_query( $conn,$sql);

    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }else{
        echo "\nEntered data successfully\n";}
        $_SESSION['assigned'] = 'true';
        echo $_SESSION['assigned'];
    }

    ?>

    <body>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <hr>

        <div class="container bootstrap snippet" style="margin-top:3px">
            <div class="row" style="margin-top:3px">
                <div class="col-lg-12" style="margin-top:3px">
                    <div class="main-box no-header clearfix" style="margin-top:3px">
                        <div class="main-box-body clearfix" style="margin-top:3px">
                            <div class="table-responsive" style="margin-top:3px">
                                <form method="post">
                                    <table class="table user-list">
                                        <thead>
                                            <tr>
                                                <th>PR Number</th>
                                                <th>Dealing Officer</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <select name="req_id">
                                                <?php
                                                    $db = new mysqli('localhost', 'root');
                                                    if ($db->connect_errno) {
                                                        echo 'Connect failed: '.$db->connect_error;
                                                        exit();
                                                    }
                                                    $db->select_db('proknap');
                                                    $cursor = $db->query("SELECT Pr_no from pr where Pr_no NOT IN (select Pr_no from assign)");
                                                    if ($db->error) {
                                                        echo $db->error.PHP_EOL;
                                                    }
                                                    //echo "<select name="."req_id".">";
                                                    echo "<option value='0'>Select</option>";
                                                    while($val = $cursor->fetch_assoc()){
                                                        echo "<option value=".'"'.$val['Pr_no'].'"'.">".$val['Pr_no']."</option>";
                                                    }
                                                    //echo "</select>";
                                                ?>
                                            </select>
                                            </td>
                                            <td>
                                                <select name="do">
                                                    <option value="">Select Dealing Officer</option>
                                                    <option value="DO1">DO1</option>
                                                    <option value="DO2">DO2</option>
                                                    <option value="DO3">DO3</option>
                                                    <option value="DO4">DO4</option>
                                                </select>
                                            </td>

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
