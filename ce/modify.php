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
<title>�޸����ݿ�����</title>
</head>

<body>
<?php
	$id=$_GET["id"];
	if($_POST["submit"]=="�޸�")
	{
		$typ=$_POST["typ"];
		$content=$_POST["content"];
		$author=$_POST["author"];
		$sql="update contents set title=$typ,contents='$content',author='$author' where id=$id";
		mysql_query($sql);
		header("location:index.php?id=$typ");
	}
	$sql="select * from contents where id=".$id;
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<form id="form1" name="form1" method="post" action="">
<table width="540" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#C2C2C2">
<tr>
  <td bgcolor="#FFFFFF">�޸�����:</td>
  <td align="right" bgcolor="#FFFFFF"><a href="index.php">���ع���ҳ</a>&nbsp;</td>
</tr>
<tr>
	<td width="60" bgcolor="#FFFFFF">�������:</td>
	<td bgcolor="#FFFFFF">
	<?php
		$sql_title="select * from title";
		$rs_title=mysql_query($sql_title);
	?>
	<select name="typ">
	<?php
		while($rows_title=mysql_fetch_assoc($rs_title))
		{
			if($rows_title["Id"]==$rows["Title"])
			{
	?>
			<option value="<?php echo $rows_title["Id"]?>" selected="selected"><?php echo $rows_title["Title"]?></option>
	<?php
			}
			else
			{
	?>
			<option value="<?php echo $rows_title["Id"]?>"><?php echo $rows_title["Title"]?></option>
	<?php
			}
		}
	?>
	</select>	</td>
</tr>
<tr>
	<td bgcolor="#FFFFFF">��������:</td>
	<td bgcolor="#FFFFFF"><textarea cols="25" rows="10" name="content"><?php echo $rows["Contents"]?></textarea></td>
</tr>
<tr>
	<td bgcolor="#FFFFFF">��������:</td>
	<td bgcolor="#FFFFFF"><input type="text" name="author" value="<?php echo $rows["Author"]?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#FFFFFF">
	<input type="submit" name="submit" value="�޸�" />
	<label>
	<input type="button" name="Submit" value="ȡ��" onclick="history.go(-1)"/>
	</label>	</td>
</tr>
</table>
</form>
</body>
</html>
