<?php
session_start();

unset($_SESSION["user_name"]);
$url = "http://localhost/proknap/login.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
?>
