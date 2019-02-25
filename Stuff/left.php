<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>left</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bs/css/bootstrap.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
	<style type="text/css">
		a{
			text-decoration: none;
			display: inline-block;
		}
		table{
			width: 100%;
			text-align: center;
		}
	</style>
</head>
<body>
		<table class="table">
		<tr class="active">
			<td><a href="get.php" class="btn  btn-warning" target="right">获得数据</a></td>
		</tr>
		<tr class="success">
			<td><a href="right.php" class="btn  btn-warning" target="right">查看数据</a></td>
		</tr>
		<tr class="warning">
			<td><a href="task.php" class="btn  btn-warning" target="right">查看任务</a></td>
		</tr>
		<tr class="info">
			<td><a href="lookup.php" class="btn  btn-warning" target="right">查看记录</a></td>
		</tr>
		<tr class="active">
			<td><a href="up.php" class="btn  btn-warning" target="right">上传数据</a></td>
		</tr>
		</table>
</body>
</html>