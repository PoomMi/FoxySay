<style>
    #box-pic{
        position: absolute;
        margin-top: 9px;
        margin-left: 17px;
        float: left;
        width: 70px;
        height: 70px;
        border: 1px solid (0, 0, 0, 0.4);
    }

    #box-name{
        position: relative;
        margin-top: 5%;
        left: 25%;
        float: left;
        font-size: 2vw;
        font-weight: bold;
        color: rgba(0,0,0,0.5);
    }
</style>

<?php
   
   if(isset($_POST['name_search'])){
        $name_search = $_POST['name_search'];

        $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
        $get_profile = "SELECT * FROM profile WHERE name='$name_search' ";
        $result = $mysqli->query($get_profile);

        if($result->num_rows == 0) {
            $found = false;

            echo '<div id = "box-name">Not Found</div>';
       } else {
            $found = true;

            $row = $result->fetch_assoc();
            $name_result = $row['name'];
            $info_result = $row['info'];
            $picture_result = $row['picture'];

            if($picture_result==NULL){
                $picture_result = "avatar.png";
            }

            ?><script>$('#search-content').css( 'cursor', 'pointer' );</script><?php

            echo '<div id = "box-pic">';
            echo '<img src = "profile/picture/'.$picture_result.'" width = "70px" height = "70px">';
            echo '</div>';
            echo '<div id = "box-name">'.$name_result.'</div>';
       }

    }
   
?>