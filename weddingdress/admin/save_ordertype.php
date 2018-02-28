<?php
header("Content-type:text/html;charset=utf-8");
$OrderTypeName=$_REQUEST['OrderTypeName'];
$OrderTypeId=$_REQUEST['OrderTypeId'];
include '../conn/conn.php';

//查找表数据数量
$countsql=mysqli_query($link, "select count(*) from `ordertypeinfo` ");
$countrow=mysqli_fetch_row($countsql);
$count=$countrow[0];

if (!empty($_REQUEST['OrderTypeId'])){
    //修改操作
    $ProductTypeId=$_REQUEST['OrderTypeId'];
    $sql="UPDATE `weddingdress`.`ordertypeinfo` SET  `OrderTypeName` = '$OrderTypeName' WHERE `OrderTypeId` = '$OrderTypeId'";
    
}
else{
    //插入操作
    $c=intval($count)+1;
    $sql="insert into `ordertypeinfo` values('$c','$OrderTypeName') ";
    
}


$result = mysqli_query($link, $sql);
if ($result){
    echo json_encode(array('success'=>true,'msg'=>'操作成功！'));
} else {
    echo json_encode(array('errorMsg'=>false));
}
?>