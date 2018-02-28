<?php
header("Content-type:text/html;charset=utf-8");
$mysql_server_name = 'localhost'; // 改成自己的mysql数据库服务器
$mysql_username = 'root'; // 改成自己的mysql数据库用户名
$mysql_password = ''; // 改成自己的mysql数据库密码
$mysql_database = 'weddingdress'; // 改成自己的mysql数据库名

$link = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password,$mysql_database);

if(mysqli_connect_errno()){
    echo "连接数据库失败：".mysqli_connect_error();
    $link=null;
    exit;
}
mysqli_query($link, "SET NAMES UTF8");
// $conn = @mysql_connect('localhost','root','');
// if (!$conn) {
//     die('Could not connect: ' . mysql_error());
// }

// mysql_select_db('weddingdress', $conn);

?>
