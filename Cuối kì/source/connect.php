<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$cookie_name = 'siteAuth';
$cookie_time = (3600 * 24 * 30); // 30 days
$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){   
    die("Kết nối không thành công".$conn->connect_error);
}


function rand_string($length) {
    $chars = "abcdefghiklmnopqrstupwsyzABCDEFGHIJKLMNOPQRSTUPWSWZ0123456789";
    $size = strlen($chars);
    $str = '';
    for ($i=0; $i<$length; $i++){
        $str .= $chars[rand(0, $size -1)];
    }
    return $str;

}

?>