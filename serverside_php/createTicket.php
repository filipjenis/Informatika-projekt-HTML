<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    require "../dbConnect.php"; // connects to the database (mariadb) and you're not getting this file.
    $email = $db->real_escape_string($_GET["email"]);
    $text = $db->real_escape_string($_GET["text"]);
    
    $time=time();

    $query = "INSERT INTO `mkt_contact_tickets` (email, text, timestamp) VALUES ('$email','$text','$time')";
        
    $db->query($query);

    echo 'ok';
?>