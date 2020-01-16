<?php
    
    $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
	$get_profile = "SELECT * FROM profile WHERE name='$username' ";
    $result = $mysqli->query($get_profile);
    $row = $result->fetch_assoc();
    
    $name = $row['name'];
    $info = $row['info'];
    $picture = $row['picture'];

    $mysqli->close();
?>