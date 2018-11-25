
<?php

	require_once('config.php');

	$email = $_GET["email"];

	$sql = mysqli_query($conn,"SELECT * FROM user where email = '$email'");

	if ( mysqli_num_rows( $sql ) > 0 ) {
		echo "1";
	} else {
		echo "2";
	}
?>