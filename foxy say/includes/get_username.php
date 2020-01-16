<?php

    $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
	$qry = "SELECT * FROM members WHERE id='$user_id' ";
	$result = $mysqli->query($qry);
    $username = $_SESSION['username'];
    $mysqli->close();
?>