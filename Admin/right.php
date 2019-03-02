<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
			echo "<script>location='../index.html'</script>";
			exit;
	}
	require "../Mysql.php";

	$db = new mysql();
	$table = 'worker';
	$sql = "SELECT * FROM ".$table;
?>

<!DOCTYPE html>
<html>
<head>
	<title>right</title>
	<meta charset="utf-8">
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
		td{
			text-align: center;
			height: 32px;
		}
		.a{
			width: 42px;
			height: 26px;
			display: inline-block;
			text-decoration: none;
			margin-left: 10px;
			font-size:18px;
			color: #fff;
			cursor:pointer;
			border-radius: 25px;
			padding-top: 2px;
		}
		.a:hover{
			background: #fff;
			color: #664033;
			text-decoration: none;
		}
		.t1{
			color: #fff;
			font-size: 16px;
		}
		table{
			margin-top: 20px;
			display: none;
			color: #fff;
		}
	    tr:hover{
	    	background-color:#403344; 
	    }
	</style>
</head>
<body class="container">
	<table class="table table-bordered">
		<tr class="t1">
			<td><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;编号</td>
			<td><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;姓名</td>
			<td><span class="glyphicon glyphicon-earphone">&nbsp;账户名</td>
			<td><span class="glyphicon glyphicon-asterisk">&nbsp;密码</td>
			<td><span class="glyphicon glyphicon-triangle-right">&nbsp;操作</td>
			
		</tr>
		<tr>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>
				<a href="Srevamp.php" class="a">修改</a>
				<a href="" class="del a">删除</a>
				
			</td>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
	$('.del').click(function(){
		if(confirm("你确定删除吗？")) {  
            alert("已删除");  
        }  
        else {  
          return false;
        }  
	});
</script>
</html>