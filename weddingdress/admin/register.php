<?php
header("Content-type:text/html;charset=utf-8");
include '../conn/conn.php';

if(isset($_SESSION['loginname'])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql1="select count(*) from `admin` where AdminName='$username' ";
    $sql2="insert into `admin`(AdminName,AdminPwd) values('$username','$password')";
    $result1=mysqli_query($link,$sql1);
    $row=mysqli_fetch_row($result1);
    if($row[0]>0){
        echo 'false';
    }else{
        $result=mysqli_query($link,$sql2);
        echo 'true';
    }
    
}
else{
    echo "NO";
    
    
}






?>