<?php
	$conn = mysqli_connect("localhost", "root", "", "review");

	if (mysqli_connect_error()) {
		die("Error connecting to website, please retry.");
	}
?>