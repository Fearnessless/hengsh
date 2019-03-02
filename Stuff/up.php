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
		body{
			background-image: linear-gradient(to bottom right, #5A495C,#CD9F64);
		}
		html,body{
	    	height: 100%;
	    	width: 100%;
	    }
		input{	
			background:#BE9363;
			background-color:#7A615E;
			padding-left: 5px;
			color: #fff;
		}
		table{
			font-size: 16px;
			width: 100%;
			height: 200px;
		}
		td{
			text-align:right;
			height: 20px;
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
			color: #fff;
			
		}
		.td2{
			padding-right:300px;
			width: 500px;
		}
		.sub{
			width: 100px;
			height: 30px;
			color: #fff;
			background: #BE9363;
			border-radius: 3px;
			border: 1px solid #BA9162;
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
						<input type="submit" name="" class="sub" value="提交">	
				</td>
			</tr>
		</table>
	</form>
</body>
</html>