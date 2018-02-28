<?php
header("Content-type:text/html;charset=utf-8");
$UserName=$_REQUEST['UserName'];
$Userphone=$_REQUEST['Userphone'];
$usersex=$_REQUEST['usersex'];
if ($usersex=='男'){
    $Usersex=1;
}
else {
    $Usersex=0;
}

include '../conn/conn.php';




    //修改操作
    $UserId=$_REQUEST['UserId'];
    $sql="UPDATE `weddingdress`.`customer` SET  `UserName` = '$UserName',`Usersex` = '$Usersex',`Userphone` = '$Userphone' WHERE `UserId` = '$UserId'";
    



$result = mysqli_query($link, $sql);
if ($result){
    echo json_encode(array('success'=>true,'msg'=>'操作成功！'));
} else {
    echo json_encode(array('errorMsg'=>false));
}
?>