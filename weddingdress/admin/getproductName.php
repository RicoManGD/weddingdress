<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';

$rs = mysqli_query($link,"SELECT productinfo.*,producttypeinfo.ProductTypeName FROM productinfo INNER JOIN producttypeinfo ON productinfo.ProductTypeId=producttypeinfo.ProductTypeId WHERE `productinfo`.InventoryStatus='空闲' ");

$result = array();
while($row = mysqli_fetch_object($rs)){
    array_push($result, $row);
}


echo json_encode($result);

?>