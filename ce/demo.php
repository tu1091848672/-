<?php
ob_start();         //打开缓冲区
    session_start();    //初始化会话数据
    require("config.php");
$sql=mysql_query("select * from Title");
while($row=mysql_fetch_assoc($sql)){
?>
<tr>
<td><?php echo $row['Title'];?></td>
</tr>
<?php
}
?>
