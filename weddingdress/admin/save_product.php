<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
$ProductName=$_REQUEST["ProductName"];
$ProductTypeId=$_REQUEST["ProductTypeId"];
$ProductRental=$_REQUEST["ProductRental"];
$ProductPrice=$_REQUEST["ProductPrice"];
$purchasePrice=$_REQUEST["purchasePrice"];
$Storearea=$_REQUEST["Storearea"];
$ProductStoretime=date("Y-m-d H:i:s");
$InventoryStatus=$_REQUEST["InventoryStatus"];
$ProductPic="";
$memo=$_REQUEST['memo'];
include '../conn/conn.php';
include 'imageutil.php';
$ProductId=$_REQUEST['ProductId'];
$maxsize=5000000;
$updir=str_replace('\\','/',dirname(dirname(__FILE__)))."/uploadimg/";

if (!empty($_REQUEST['ProductId'])){
    
    //修改操作
   
    if($_FILES["ProductPic"]["size"]>0){
        $filename=(_UPLOADPIC($_FILES["ProductPic"],$maxsize,$updir,$newname='date'));
        $ProductPic="/uploadimg/".$filename;
        //压缩图片处理
        $img=getImageInfo(str_replace('\\','/',dirname(dirname(__FILE__)))."/uploadimg/".$filename);
        if($img[0]>=800||$img[1]>=800){
            // echo "resize";
            resize(str_replace('\\','/',dirname(dirname(__FILE__)))."/uploadimg/".$filename, $img[0]/4,$img[1]/4);
            $ProductPic_thumb="/uploadimg/thumb/".$filename;
        }else{
            $ProductPic_thumb=$ProductPic;
        }
        $sql="UPDATE `weddingdress`.`productinfo` SET  `ProductTypeId` = '$ProductTypeId', `ProductName` = '$ProductName', `ProductRental` = '$ProductRental', `ProductPrice` = '$ProductPrice', `purchasePrice` = '$purchasePrice', `Storearea` = '$Storearea', `ProductStoretime` = '$ProductStoretime', `ProductPic` = '$ProductPic_thumb', `InventoryStatus` = '$InventoryStatus', `memo` = '$memo' WHERE `ProductId` = '$ProductId' ";
        
    }else {
        $sql="UPDATE `weddingdress`.`productinfo` SET  `ProductTypeId` = '$ProductTypeId', `ProductName` = '$ProductName', `ProductRental` = '$ProductRental', `ProductPrice` = '$ProductPrice', `purchasePrice` = '$purchasePrice', `Storearea` = '$Storearea', `ProductStoretime` = '$ProductStoretime',  `InventoryStatus` = '$InventoryStatus', `memo` = '$memo' WHERE `ProductId` = '$ProductId' ";
        
    }
    
}
else{
    //插入操作
    if($_FILES["ProductPic"]["size"]>0){
        $filename=(_UPLOADPIC($_FILES["ProductPic"],$maxsize,$updir,$newname='date'));
        $ProductPic="/uploadimg/".$filename;
        //压缩图片处理
        $img=getImageInfo(str_replace('\\','/',dirname(dirname(__FILE__)))."/uploadimg/".$filename);
        if($img[0]>=800||$img[1]>=800){
            // echo "resize";
            resize(str_replace('\\','/',dirname(dirname(__FILE__)))."/uploadimg/".$filename, $img[0]/4,$img[1]/4);
            $ProductPic_thumb="/uploadimg/thumb/".$filename;
        }else{
            $ProductPic_thumb=$ProductPic;
        }
        $sql="INSERT INTO `weddingdress`.`productinfo` (`ProductTypeId`, `ProductName`, `ProductRental`, `ProductPrice`, `purchasePrice`, `Storearea`, `ProductStoretime`, `ProductPic`, `InventoryStatus`, `memo` ) VALUES ('$ProductTypeId', '$ProductName', '$ProductRental', '$ProductPrice', '$purchasePrice', '$Storearea', '$ProductStoretime', '$ProductPic_thumb', '$InventoryStatus', '$memo' )  ";
        
    }else {
        $sql="INSERT INTO `weddingdress`.`productinfo` (`ProductTypeId`, `ProductName`, `ProductRental`, `ProductPrice`, `purchasePrice`, `Storearea`, `ProductStoretime`,  `InventoryStatus`, `memo` ) VALUES ('$ProductTypeId', '$ProductName', '$ProductRental', '$ProductPrice', '$purchasePrice', '$Storearea', '$ProductStoretime',  '$InventoryStatus', '$memo' )  ";
        
    }
    
}


$result = mysqli_query($link, $sql);
if ($result){
    echo json_encode(array('success'=>true,'msg'=>'操作成功！'));
} else {
    echo json_encode(array('errorMsg'=>false));
}


?>