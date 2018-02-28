<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;

$rs = mysqli_query($link,"select count(*) from productinfo");
$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysqli_query($link,"SELECT productinfo.*,producttypeinfo.ProductTypeName FROM productinfo INNER JOIN producttypeinfo ON productinfo.ProductTypeId=producttypeinfo.ProductTypeId limit $offset,$rows");

$items = array();
while($row = mysqli_fetch_object($rs)){
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>