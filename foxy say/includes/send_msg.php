<?php
   
    date_default_timezone_set("Asia/Bangkok"); //set time zone
    $date = date("d/m/Y"); //get current date
    $time = date("H:i:s"); // get current time
    $seen = 1;

    $sender = $_POST['user'];
    $receiver = $_POST['target'];
    $msg = $_POST['msg'];
    if($msg!=""){
        $insert_msg = new mysqli('localhost', 'root', '', 'webgroup');
        $sql = "INSERT INTO chat (sender, receiver, msg, date, time,seen)  
                VALUES ('$sender','$receiver','$msg','$date','$time','$seen')";
        $insert_msg->query($sql);
        $insert_msg->close();    
    }
    
?>