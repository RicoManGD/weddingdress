<?php
header("Content-type:text/html;charset=utf-8");
        						include 'conn/conn.php';
        						$cs=mysqli_query($link,'select count(*) from productinfo');
        						$csrow=mysqli_fetch_row($cs);
        						$count=$csrow[0];
        						$rows=ceil($count/4);
        						
        						
        						for ($rowc=1;$rowc<$rows;$rowc++){
        						    echo "<div class='tab_img'>";
        						    $sqlrs="select * from productinfo limit $rowc,4";
        						    $rs = mysqli_query($link,$sqlrs);
        						    while (($row=mysqli_fetch_object($rs))!== false){
        						        $ProductPic=$row['ProductPic'];
        						        $picsrc=substr($ProductPic, 1);
        						        echo "<div class='col-md-3 img-top '>";
        						        echo "<a href='$picsrc'>";
        						        echo "<img src='$picsrc' class='img-responsive' alt=''>";
        						        echo "</a>";
        						        echo "<button type='button' class='xqbutton' >查看详情</button>";
        						        echo "</div>";
        						    
        						    }
        						   
        						    echo "</div>";
        						}
        						
        						
?>