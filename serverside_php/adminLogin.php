<?php header('Access-Control-Allow-Origin: *'); ?><!-- for testing purposes -->
<?php
    require "../dbConnect.php"; // connects to the database (mariadb) and you're not getting this file.
    if (defined('STDIN')) {
        $name = $argv[1];
        $password = sha1($argv[2]);
    } else {
        $name = $_GET["name"];
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