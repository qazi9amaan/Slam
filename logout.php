<?php
  	session_start();
	session_unset();
	session_destroy();
	header("Location: login.php");
	setcookie("user_name", "", time() - 3600);
	setcookie("pass_word", "", time() - 3600);

?>	


