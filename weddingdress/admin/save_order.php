<?php
header("Content-type:text/html;charset=utf-8");
$ProductId=$_REQUEST['ProductId'];
$OrderTypeId=$_REQUEST['OrderTypeId'];
$UserName=$_REQUEST['UserName'];
$Userphone=$_REQUEST['Userphone'];
$Orderdate=$_REQUEST['Orderdate'];
$BeginDate=$_REQUEST['BeginDate'];
$EndDate=$_REQUEST['EndDate'];
$bargainmoney=$_REQUEST['bargainmoney'];
$totalprice=$_REQUEST['totalprice'];
$poststatus=$_REQUEST['poststatus'];
$recevstatus=$_REQUEST['recevstatus'];
$memo=$_REQUEST['memo'];
include '../conn/conn.php';



if (!empty($_REQUEST['OrderId'])){
    //修改操作
    $OrderId=$_REQUEST['OrderId'];
    
    $r=mysqli_query($link, "select * from customer where UserName='$UserName' and Userphone='$Userphone' ");
    $r_result=mysqli_fetch_row($r);
    if (intval($r_result[0])>0){
        $u=mysqli_query($link, "select UserId from customer where UserName='$UserName' and Userphone='$Userphone' ");
        $u_result=mysqli_fetch_row($u);
        $UserId=$u_result[0];
        
    }
    else{
        $add=mysqli_query($link, "INSERT INTO `weddingdress`.`customer` ( `UserName`,`Userphone`) VALUES  ( '$UserName','$Userphone') ");
        $u=mysqli_query($link, "select UserId from customer where UserName='$UserName' and Userphone='$Userphone' ");
        $u_result=mysqli_fetch_row($u);
        $UserId=$u_result[0];
    }
    $sql="UPDATE `weddingdress`.`order` SET  `OrderTypeId` = '$OrderTypeId',`UserId` = '$UserId',`ProductId` = '$ProductId',`Orderdate` = '$Orderdate',`BeginDate` = '$BeginDate',`EndDate` = '$EndDate',`bargainmoney` = '$bargainmoney',`totalprice` = '$totalprice',`memo` = '$memo',`poststatus` = '$poststatus',`recevstatus` = '$recevstatus'  WHERE `OrderId` = '$OrderId'";
    
}
else{
    //插入操作
    $r=mysqli_query($link, "select count(*) from customer where UserName='$UserName' and Userphone='$Userphone' ");
    $r_result=mysqli_fetch_row($r);
    if (intval($r_result[0])>0){
        $u=mysqli_query($link, "select UserId from customer where UserName='$UserName' and Userphone='$Userphone' ");
        $u_result=mysqli_fetch_row($u);
        $UserId=$u_result[0];
    }
    else{
        $add=mysqli_query($link, "INSERT INTO `weddingdress`.`customer` ( `UserName`,`Userphone`) VALUES  ( '$UserName','$Userphone') ");
        $u=mysqli_query($link, "select UserId from customer where UserName='$UserName' and Userphone='$Userphone' ");
        $u_result=mysqli_fetch_row($u);
        $UserId=$u_result[0];
    }
    $sql="INSERT INTO `weddingdress`.`order` (  `OrderTypeId`, `UserId`, `ProductId`, `Orderdate`, `BeginDate`, `EndDate`, `bargainmoney`, `totalprice`, `memo`, `poststatus`, `recevstatus` ) VALUES (  '$OrderTypeId', '$UserId', '$ProductId', '$Orderdate', '$BeginDate', '$EndDate', '$bargainmoney', '$totalprice', '$memo', '$poststatus', '$recevstatus' ) ";
    
}


$result = mysqli_query($link, $sql);
if ($result){
    echo json_encode(array('success'=>true,'msg'=>'操作成功！'));
} else {
    echo json_encode(array('errorMsg'=>false));
}
?>