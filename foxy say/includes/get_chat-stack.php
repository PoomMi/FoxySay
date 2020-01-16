<?php

    $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
    $get_contact = "SELECT * FROM contact WHERE name='$username' "; 
    $result = $mysqli->query($get_contact); 

    while($row = $result->fetch_assoc()){ 
        echo '<div class = "chat-list">'.$row['contact'].'</div>';
    }
?>