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
	<meta charset="utf-8">
	<title>up</title>
	<link rel="stylesheet" href="bs/css/bootstrap.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
	<script src="jquery.js"></script>
	<style type="text/css">
		*{
			font-family: 微软雅黑;
		}
		p{
			text-align: center;
			font-size: 18px;
			margin-top: 18px;
		}
		hr{
			margin: 0px;
		}
		table{
			font-size: 16px;
			width: 100%;
			height: 200px;
		}
		.tr{
			border-bottom: 1px solid #ccc;
		}
		td{
			text-align:right;
			height: 20px;
		}
		.sel{
			text-align: left;
		}
		th{
			text-align: center;
		}
		.input{
			height: 32px;
			width: 100%;
			border-radius: 4px;
			font-size: 14px;
			border: 1px solid #ccc;
		}
		.td1{
			margin-top: 20px;
			width: 250px;
			
		}
		.td2{
			padding-right:300px;
			width: 500px;
		}
		.btn{
			width: 100px;
		}
		.wen{
			border: 0px;
		}
	</style>
</head>
<body>
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="up.php">单个上传</a></li>
		<li role="presentation"><a href="file.php">文件上传</a></li>
	</ul>
	<form action="doup.php" method="post">
		<table>
			<tr>
			<td class="td1">姓名：</td>
				<td class="td2">
					<input type="text" name="" class="input">
				</td>
			</tr>
			<tr>
				<td class="td1">手机号：</td>
				<td class="td2">
					<input type="text" name="" class="input">
				</td>
			</tr>
			<tr>
				<td class="td1">职业：</td>
				<td class="td2">
					<input type="text" name="" class="input">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="td2">
						<input type="submit" name="" class="btn btn-info" value="提交">	
				</td>
			</tr>
		</table>
	</form>
</body>
</html>