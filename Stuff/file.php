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
		table{
			font-size: 16px;
			width: 100%;
			margin-top: 25px;
		}
		td{
			text-align:center;	
			width: 500px;
		}
		
		.btn{
			text-align: left;
		}
		.file{
			padding-left: 20px;
		}
		input{
			color: #fff;
		}
		.p{
			text-align: right;
			color: #fff;
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
		<li role="presentation" class=""><a href="up.php">单个上传</a></li>
		<li role="presentation" class="active"><a href="file.php">文件上传</a></li>
	</ul>
	<form action="../dataup/doup.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td class="p"><p>文件上传：</p></td>
				<td class="file">
					<p><input type="file" name="upfile" id="upfile"></p>
				</td>
				<td class="btn">
					<p><input type="submit" name="" class="sub" value="提交"></p>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>