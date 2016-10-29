<html><head><title>MySQL Table Viewer</title></head><body>
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

$database = 'proknap';
$table = 'user';

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT * FROM {$table}");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);

echo "<h1>Table: {$table}</h1>";
echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysql_free_result($result);
?>
</body></html>
<!--!doctype html>
<!--?php
error_reporting(E_ERROR);
session_start();
include("https://localhost/proknap/functions.php");
$message="";
$user="root";
$p="";
$h="localhost";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $db=mysqli_connect("localhost","$user","$p","proknap")
  or
  die("Unable to connect to MySQL");

  if(mysqli_select_db($db,"proknap"))
  echo"connected to db";
  else
  echo "not";
  if(count($_POST)>0) {
    if($res=mysqli_query($db,"SELECT * FROM user")){
      echo "HELOO";
      while($val=mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>".$val['Pr_no']."</td>";
        echo "<td>".$val['Pr_date']."</td>";
        echo "<td>".$val['Descr']."</td>";
        echo "<td>".$val['Dept_id']."</td>";
        echo "<td>date</td>";
        echo "<td>status</td>";
        echo "</tr>";
      }
    }

    if(isset($_SESSION["user_id"])) {
      if(!isLoginSessionExpired()) {
        header("Location:https://localhost/proknap/dealingOfficer.html");
      } else {
        header("Location:https://localhost/proknap/dealingOfficer.html");
      }
    }

    if(isset($_POST["session_expired"])) {
      $message = "Login Session is Expired. Please Login Again";
    }
  }
}
?>
</html-->
