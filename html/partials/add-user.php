  <style type="text/css">
   .rounded{
    font-size: 16px;
    padding: 10px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: px;
    width: 500px;
    height:50px
  }
</style>


<?php
error_reporting(E_ERROR);
session_start();
if(isset($_POST['submitf']))
{
  $db = new mysqli('localhost', 'root');
  if ($db->connect_errno) {
  echo 'Connect failed: '.$db->connect_error;
  exit();
}
$db->select_db('proknap');
if($_POST[password]!=$_POST[repassword]){
echo "<p style='color:red; margin:20px; text-align: center; font-weight: 400; font-size:14pt;'>Passwords do not match.</p></br></br>";
header("Refresh:0");
}
else{
$cursor = $db->query("Insert into user values ('$_POST[uname]','$_POST[dept]','$_POST[auth]','$_POST[password]')");
if ($cursor){
echo "<p style='margin:50px; text-align: center; font-weight: 400; font-size:14pt;'>User has been added.</p></br></br>";
header("Refresh:0");
}
}
}
?>


</br>
</br>
</br>

<div>
<form action = "" method = "POST" >
  <table width="800px" border="0px">
    <tr>
      <td style="text-align: center;" colspan=2>
        <input class="rounded" name = "uname" type="text" placeholder="Enter Unique User ID " />
      </td>
    </tr> 
    <tr>
      <td colspan=2></br></td>
    </tr> 
    <tr>
      <td style="text-align: center;" colspan=2>
        <input class="rounded" type="password" placeholder="Enter Password" name="password"/>      
      </td>
    </tr>
    <tr>
      <td colspan=2></br></td>
    </tr> 
    <tr>
      <td style="text-align: center;" colspan=2>
        <input class="rounded" type="password" placeholder="Re - Enter Password" name="repassword"/>      
      </td>
    </tr>
    <tr>
      <td colspan=2></br></td>
    </tr> 
    <tr><td style=" width:50%; text-align:right; padding-right:30px;">
      <select name="auth" class="rounded" style=" font-size: 15px; width: 200px; margin-top: 0px; border:none; cursor: pointer;">
        <?php
        error_reporting(E_ERROR);
        $db = new mysqli('localhost', 'root');
        if ($db->connect_errno) {
          echo 'Connect failed: '.$db->connect_error;
          exit();
        }
        $db->select_db('proknap');
        $cursor = $db->query("select * from authorisation");
        if ($db->error) {
        echo $db->error.PHP_EOL;
      }
      echo "<option value='0' style='text-align: center;'>Select Authorization</option>";
      while($val = $cursor->fetch_assoc()){
      echo "<option value=".$val['Auth_id'].">".$val['Role']."</option>";
    }
    echo "</select>";
    ?>
</td>
<td style="width=50%; margin:0px; padding-left:30px;">
      <select name="dept" class="rounded" style=" font-size: 15px; width: 200px; margin-top: 0px; border:none; cursor: pointer;">
        <?php
        error_reporting(E_ERROR);
        $db = new mysqli('localhost', 'root');
        if ($db->connect_errno) {
          echo 'Connect failed: '.$db->connect_error;
          exit();
        }
        $db->select_db('proknap');
        $cursor = $db->query("select * from department");
        if ($db->error) {
        echo $db->error.PHP_EOL;
      }
      echo "<option value='0' style='text-align: center;'>Select Department</option>";
      while($val = $cursor->fetch_assoc()){
      echo "<option value=".$val['Dept_id'].">".$val['Dept_name']."</option>";
    }
    echo "</select>";
    ?>
</td></tr>
<tr>
  <td></br></td>
</tr> 
<tr>
  <td style="text-align: center;" colspan=2><input class="rounded" type="submit" name = "submitf" style="font-size: 15px; width: 200px; margin-top: 0px"/></td>
</tr> 
<tr>
  <td></br></td>
</tr>  
</table>
</form>
</div>