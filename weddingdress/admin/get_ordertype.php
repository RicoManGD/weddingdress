<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';
$rs = mysqli_query($link,'select * from ordertypeinfo');
$result=array();
while ($row=mysqli_fetch_object($rs)){
    array_push($result, $row);
   
}

echo json_encode($result);

?>