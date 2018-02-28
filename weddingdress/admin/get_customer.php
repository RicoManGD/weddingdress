<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';
$rs = mysqli_query($link,"SELECT *,CASE Usersex WHEN 1 THEN '男' ELSE '女' END AS usersex FROM `customer` ");
$result=array();
while ($row=mysqli_fetch_object($rs)){
    array_push($result, $row);
   
}

echo json_encode($result);

?>