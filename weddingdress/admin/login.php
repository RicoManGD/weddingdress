<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';
$username=$_POST["username"];
$password=$_POST["password"];
$sql="select count(*) from `admin` where AdminName='$username' and AdminPwd='$password' ";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_row($result);

if($row[0]>0){

$_SESSION['loginname']=$username;
// 	echo json_encode(array('result'=>'true'));
echo 'true';


}else{
// 	echo json_encode(array('result'=>'false'));
    echo 'false';
}
?>