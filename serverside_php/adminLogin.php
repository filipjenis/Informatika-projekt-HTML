<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    require "../dbConnect.php";
    if (defined('STDIN')) {
        $name = $db->real_escape_string($argv[1]);
        $password = sha1($argv[2]);
    } else {
        $name = $db->real_escape_string($_GET["name"]);
        $password = sha1($_GET["password"]);
    }
    
    $query = "SELECT * FROM `mkt_website_login` WHERE username='$name' AND password='$password'";
        
    $result = $db->query($query);
    $row = mysqli_fetch_array($result);
    if (is_null($row)){
        echo 0;
    }else{
	$arr = array('id'=>$row['id'], 'name'=>$row['username'], 'password'=>$row['password']);
        echo json_encode($arr);
    }
?>