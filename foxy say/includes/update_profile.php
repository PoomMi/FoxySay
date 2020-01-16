<?php

$username = $_POST['username'];
$info = $_POST['info'];
$picture = $_POST['pic'];

//update at profile data
$update_profile = new mysqli('localhost', 'root', '', 'webgroup');
$sql = "UPDATE profile SET picture = '$picture', info = '$info' WHERE name = '$username' ";

$update_profile->query($sql);
$update_profile->close();


?>