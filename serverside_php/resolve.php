<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    require "../dbConnect.php";
    if (defined('STDIN')) {
        $name = $db->real_escape_string($argv[1]);
        $password = $argv[2];
	    $id = $db->real_escape_string($argv[3]);
        $resolveId = $db->real_escape_string($argv[4]);
    } else {
        $name = $db->real_escape_string($_GET["name"]);
        $password = $_GET["password"];
	    $id = $db->real_escape_string($_GET["id"]);
        $resolveId = $db->real_escape_string($_GET["resolveId"]);
    }
    
    $query = "SELECT * FROM `mkt_website_login` WHERE username='$name' AND password='$password' AND id='$id'";
        
    $result = $db->query($query);
    $row = mysqli_fetch_array($result);
    if (is_null($row)){
        echo 0;
    }else{
        $query = "UPDATE `mkt_contact_tickets` SET `resolved`=1 WHERE `id`=$resolveId";
        $result = $db->query($query);
        echo $result;
    }
?>