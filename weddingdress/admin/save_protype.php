<?php
header("Content-type:text/html;charset=utf-8");
$ProductTypeName=$_REQUEST['ProductTypeName'];
$ProductTypeId=$_REQUEST['ProductTypeId'];
include '../conn/conn.php';

//查找表数据数量
$countsql=mysqli_query($link, "select count(*) from `producttypeinfo` ");
$countrow=mysqli_fetch_row($countsql);
$count=$countrow[0];

if (!empty($_REQUEST['ProductTypeId'])){
    //修改操作
    $ProductTypeId=$_REQUEST['ProductTypeId'];
    $sql="UPDATE `weddingdress`.`producttypeinfo` SET  `ProductTypeName` = '$ProductTypeName' WHERE `ProductTypeId` = '$ProductTypeId'";
    
}
else{
    //插入操作
    $c=intval($count)+1;
    $sql="insert into `producttypeinfo` values('$c','$ProductTypeName') ";
    
}


$result = mysqli_query($link, $sql);
if ($result){
    echo json_encode(array('success'=>true,'msg'=>'操作成功！'));
} else {
    echo json_encode(array('errorMsg'=>false));
}
?>