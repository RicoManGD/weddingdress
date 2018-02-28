<?php
header("Content-type:text/html;charset=utf-8");
$id = intval($_REQUEST['id']);
include '../conn/conn.php';

$sql = "delete from `producttypeinfo`  where ProductTypeId = $id";
$result = mysqli_query($link,$sql);
if ($result){
    echo "true";
} else {
    echo "false";
}
?>