<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>删除数据库数据</title>
</head>
<body>
<?php
	require("config.php");
	$id=$_GET["id"];
	$typ=$_GET["typ"];
	$sql="delete from contents where id=$id";
	mysql_query($sql);
	header("location:index.php?id=$typ");
?>
</body>
</html>
