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
if(isset($_POST['submit3'])){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,'proknap');

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
    }
    //echo $_POST['tid']."</br>".$_SESSION['pr'];
    //if(isset($_POST['status']))
    $sql = "UPDATE tender SET Status=6 WHERE T_id=".$_POST['tid']." and Pr_no=".$_SESSION['pr'];
    unset($_SESSION['pr']);

    $retval = mysqli_query( $conn,$sql);
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }else{
        echo "\nEntered data successfully\n";}
    }

    ?>
    <body>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <hr>
        <div class="container bootstrap snippet" height="500">
            <div class="row"  style="width:800px; height:500px;">
                <div class="col-lg-12"  style="width:800px; height:500px;">
                    <div class="main-box no-header clearfix"  style="width:800px; height:500px;">
                        <div class="main-box-body clearfix"  style="width:800px; height:500px;">
                            <div class="table-responsive"  style="width:800px; height:500px;">
                                <form action="eval.php" method="post">
                                    <table class="table user-list">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                <select name="req_id" >
                                                    <?php
                                                    $db = new mysqli('localhost', 'root');
                                                    if ($db->connect_errno) {
                                                        echo 'Connect failed: '.$db->connect_error;
                                                        exit();
                                                    }
                                                    $db->select_db('proknap');
                                                    $cursor = $db->query("SELECT Pr_no from tender where Status=5");
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
                                                <select name="tid" >
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
                                                            $cursor = $db->query("SELECT T_id from tender where Pr_no=".$_POST['req_id']);
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
                                                <td>
                                                <input name="submit3" type="submit" style="width="100px";color:black;text-transform: uppercase;text-align:center;" value="Update Evaluation Status"></input>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>

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
