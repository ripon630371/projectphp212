<?php

	$db = mysqli_connect("localhost", "root", "", "sms2-212");

	if ( $db ){
		// echo "Database Connection Established";
	}
	else{
		die( "Database Connection Failed" );
	}

?>