<?php
header("Content-type:text/html;charset=utf-8");
include_once '../conn/conn.php';
function randrgb()  
{  
  $str='0123456789ABCDEF';  
    $estr='#';  
    $len=strlen($str);  
    for($i=1;$i<=6;$i++)  
    {  
        $num=rand(0,$len-1);    
        $estr=$estr.$str[$num];   
    }  
    return $estr;  
} 

$sql="SELECT `OrderId`, `order`.`OrderTypeId`, `order`.`UserId`, `order`.`ProductId`, `Orderdate`, `BeginDate`, `EndDate`, `bargainmoney`, `totalprice`, `order`.`memo`, `poststatus`, `recevstatus` , `customer`.`Userphone`,`customer`.`UserName`, `ordertypeinfo`.`OrderTypeName`, `productinfo`.`ProductName` FROM `order` INNER JOIN `ordertypeinfo` ON `order`.`OrderTypeId`=`ordertypeinfo`.`OrderTypeId` INNER JOIN `customer` ON `order`.`UserId`=`customer`.`UserId` INNER JOIN `productinfo` ON `order`.`ProductId`=`productinfo`.`ProductId`WHERE `order`.`OrderTypeId`='2'";
$result=mysqli_query($link, $sql);
while ($row=mysqli_fetch_assoc($result)){
    $color=randrgb();
    $title=$row['UserName'].' '.$row['ProductName'].' 定金:'.$row['bargainmoney'].' 总价:'.$row['totalprice'];
    $data[] = array(
        'id' => $row['OrderId'],//事件id
        'title' => $title,//事件标题
        'start' => $row['BeginDate'],//事件开始时间
        'end' => $row['EndDate'],//结束时间
        'allDay' => true, //是否为全天事件
        'color' => $color //事件的背景色
    );
    
    
}
echo json_encode($data);

?>