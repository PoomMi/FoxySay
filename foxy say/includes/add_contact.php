<?php
    function add_contact($name, $contact) {
        $db_connect = new mysqli('localhost', 'root', '', 'webgroup');
        $sql = "INSERT INTO contact (name,contact)  VALUES ('$name','$contact')";
        $db_connect->query($sql);

        $sql = "INSERT INTO contact (name,contact)  VALUES ('$contact','$name')";
        $db_connect->query($sql);
    }


    $name = $_POST['name'];
    $contact = $_POST['contact'];

    add_contact($name, $contact);

?>