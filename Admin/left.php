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
		body{
			background: linear-gradient(to bottom right, #3E3246,#6E3F47);
		}
		html,body{
	    	height: 100%;
	    	width: 100%;
	    }
		a{
			text-decoration: none;
			display: inline-block;
			color: #B7AFB6;
			font-size: 16px;
			height: 40px;
			width: 144px;
			padding-top: 10px;
		}
		a:visited{
        	color:#fff;
        	text-decoration: none;
		}
		a:hover{
			color: #fff;
			text-decoration: none;
		}
		table{
			width: 144px;
			text-align: center;
			margin-left: 3px;
		}
		td{
			height:40px;
		}
		tr{
			border-bottom: 1px solid #604951;
		}
		tr:hover{
			background: #302631;
		}
		
	</style>
</head>
<body>
		<table>
			<tr>
				<td><a href="right.php" target="right">查看员工</a></td>
			</tr>
			<tr>
				<td><a href="add.php" target="right">添加员工</a></td>
			</tr>
			<tr>
				<td><a href="data.php" target="right">查看数据</a></td>
			</tr>
		</table>
</body>
</html>