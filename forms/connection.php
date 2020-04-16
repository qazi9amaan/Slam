<?php
	
		 $dbhost = "localhost";
		 $dbuser = "root";
		 $dbpass = "";
		 $db = "slambook";
		 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
		
?>