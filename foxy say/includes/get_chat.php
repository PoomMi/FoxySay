<style>
    .msg{
        display: inline-block;       
        padding: 7px 7px;
        max-width: 155px;
        border-radius: 10px;      
        min-width: 20px;
        cursor: pointer;
    }

    .msg-row{
        position: relative;
        margin-top: 10px;
        width: 100% ;
        float: left;      
    }
</style>

<?php

    $sender = $_POST['sender']; //set sender name
    $receiver = $_POST['receiver']; //set receiver name

    $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
    $get_chat = "SELECT * FROM chat WHERE (sender='$sender' AND receiver='$receiver') OR 
                (sender='$receiver' AND receiver='$sender')"; 
    $result = $mysqli->query($get_chat); 

    while($row = $result->fetch_assoc()){ 
        $date = $row['date'];
        $time = date('H:i', strtotime($row['time']));

        echo '<div class = "msg-row">';
        if($sender==$row['sender']){
            echo '<div class = "msg" style = "float: right; margin-right: 10px; background: #b0dfe5"
                    title = "Date: '.$date.'&#xA;Time: '.$time.'">';
            echo $row['msg'];
            echo '</div>';
        }
        else{
            echo '<div class = "msg" style = "float: left; margin-left: 10px; background: #DADADA"
                    title = "Date: '.$date.'&#xA;Time: '.$time.'">';
            echo $row['msg'];
            echo '</div>';
        } 
        echo '</div>'; 
        
        echo '<div id = end-chat></div>';
    }

?>

<script>
    $('.msg-box').animate({scrollTop: $("#end-chat").offset().top}, 1);
</script>