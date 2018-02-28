<?php
header("Content-type:text/html;charset=utf-8");
$id = intval($_REQUEST['id']);
include '../conn/conn.php';

$sc=mysqli_query($link, "select count(*)from `order` where UserId=$id");
$scresult=mysqli_fetch_row($sc);
if (intval($scresult[0])>0){
    echo "have";
    
}else {
    $sql = "delete from `customer`  where `UserId` = $id";
    $result = mysqli_query($link,$sql);
    if ($result){
        echo "true";
    } else {
        echo "false";
    }
    
}


?>