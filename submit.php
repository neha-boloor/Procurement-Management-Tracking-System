<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thank you</title>
</head>

<body>
<?php
$to="rajayuv@gmail.com";
$subject="Mail from ".$_POST["name"];
$message=$_POST["message"]."<br>-".$_POST["name"];
 $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:".$_POST["email"] . "\r\n";
 if(mail($to,$subject,$message,$headers))
      {
echo 'Sent!';
echo '<script>setTimeout(function(){window.location.assign("http://artistsforumni.tk/")},4000);</script>';
	  }
	  else
	  {
		  echo 'not sent!';
echo '<script>setTimeout(function(){window.location.assign("http://artistsforumni.tk/contact.html")},4000);</script>';
	  }
?>
</body>
</html>