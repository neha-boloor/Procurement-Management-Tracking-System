<?php
Session_start();
Session_destroy();
header('Location: ' . 'http://localhost/proknap/login.php');

?>
