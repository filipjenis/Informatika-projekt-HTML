<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    require "../dbConnect.php";
    if (defined('STDIN')) {
        $name = $db->real_escape_string($argv[1]);
        $password = $argv[2];
	    $id = $db->real_escape_string($argv[3]);
    } else {
        $name = $db->real_escape_string($_GET["name"]);
        $password = $_GET["password"];
	    $id = $db->real_escape_string($_GET["id"]);
    }
    
    $query = "SELECT * FROM `mkt_website_login` WHERE username='$name' AND password='$password' AND id='$id'";
        
    $result = $db->query($query);
    $row = mysqli_fetch_array($result);
    if (is_null($row)){
        echo 0;
    }else{
        $querry = "SELECT * FROM `mkt_contact_tickets`";
        $result = $db->query($query);
        $output = array();
        while($row = mysqli_fetch_array($result)){
            $arr = array('id'=>$row["id"], 'email'=>$row["email"], 'text'=>$row["text"], 'timestamp'=>date("F j, Y, g:i a",$row["timestamp"]), 'resolved'=>$row["resolved"]);
            array_push($output,$arr);
        }
        echo json_encode($output);
    }
?>