<?php
	ob_start();
	session_start();
	require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="/style.css" rel="stylesheet" type="text/css" />
<title>插入数据库数据</title>
</head>
<body>
<?php
	if($_POST["Submit"])
	{
		$typ=$_POST["typ"];
		$content=$_POST["content"];
		$author=$_POST["author"];
		$sql="insert into contents(title,contents,author) values ($typ,'$content','$author')";
		mysql_query($sql);
		header("location:index.php?id=$typ");
	}
	$sql="select * from title";
	$rs=mysql_query($sql);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="540" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#C2C2C2">
    <tr>
      <td align="center" bgcolor="#FFFFFF">添加内容</td>
      <td align="right" bgcolor="#FFFFFF"><a href="index.php">返回管理页</a>&nbsp;</td>
    </tr>
    <tr>
      <td width="72" bgcolor="#FFFFFF">内容类别:</td>
      <td width="445" bgcolor="#FFFFFF"><label>
        <select name="typ" id="typ">
		<?php
			while($rows=mysql_fetch_assoc($rs))
			{
			?>
			<option value="<?php echo $rows["Id"]?>"><?php echo $rows["Title"]?></option>
			<?php
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">内容详情:</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="content" cols="30" rows="10" id="content"></textarea>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">内容作者:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="author" type="text" id="author" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><label>
        <input type="submit" name="Submit" value="提交" />
        <input type="reset" name="Submit2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
