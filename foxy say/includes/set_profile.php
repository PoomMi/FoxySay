<?php

    $name = $_POST['username'];
    $info = NULL;
    $picture = "avatar.png";
    $db_connect = new mysqli('localhost', 'root', '', 'webgroup');
    $sql = "INSERT INTO profile (name,info,picture) 
				VALUES ('$name','$info','$picture')";
    $db_connect->query($sql);
    $db_connect->close();

?>