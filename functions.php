<?php
function isLoginSessionExpired() {
	$login_session_duration = 1;
	$current_time = time();
	if(isset($_SESSION['loggedin_time'])){
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){
			return true;
		}
	}
	return false;
}
?>
