<style>
    #pic{
        position: relative;
        width: 170px;
        height: 170px;
        margin: 30.5% 19.5%;
        top: -90px;
        left: -85px;
        border: 1px solid rgba(0, 0, 0, 0.4);
        float: left;
    }

    #info{
        position: relative;
        border: 1px solid black;
        overflow: auto;
        width: 50%;
        height: 75%;
        padding: 10px 15px;
        margin: -85.5% 39%;
        float: left;
    }

    #btnAdd{
        position: relative;
        margin-top: 53%;   
        right: -12%;
    }
</style>

<?php
    $name_result = $_POST['name_result'];
    $username = $_POST['username'];
    $can_add = true;

    $mysqli = new mysqli('localhost', 'root', '', 'webgroup');
    $get_profile = "SELECT * FROM profile WHERE name='$name_result' "; //access profile
    $check_contact = "SELECT * FROM contact WHERE name='$username' "; //access contact
    $result_profile = $mysqli->query($get_profile); 
    $result_contact = $mysqli->query($check_contact);

    $row_p = $result_profile->fetch_assoc(); //row from profile table

    $info_result = $row_p['info'];
    $picture_result = $row_p['picture'];

    echo '<div id = "pic">';
    echo '<img src = "profile/picture/'.$picture_result.'" width = "170px" height = "170px">';
    echo '</div>';
    echo '<div id = "info">';
    echo '<p>Username : '.$name_result.'</p>';
    echo '<p>Information : '.$info_result.'</p>';
    echo '</div>';

    while($row_c = $result_contact->fetch_assoc()){ //row from contact table
        if($name_result == $row_c['contact']){
            $can_add = false;
            break;
        }
    }
    if($name_result == $username ){
        $can_add = false;
    }

    if($can_add){
        echo '<button id = "btnAdd">Add Contact</button>';
    } 

?>

<script>
    $('#btnAdd').click(function(){
        var user = '<?php echo $username ?>';
        var n_s = '<?php echo $name_result ?>';
        $.post( "includes/add_contact.php", { name: user, contact: n_s } );
        $(location).attr('href', 'profile.php');
    });
</script>