<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
?>
<?php
	print_r($_GET['id']);
	$id=$_GET['id'];
	require "../Mysql.php";
	
	$db = new mysql();
	$table = 'owndata';
	$sql = "SELECT * FROM owndata WHERE workid=".$id;
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
		a{
			color: #fff;
		}
		a:hover{
			color: #fff;
		}
		table{
			display: none;
		}
		.search{
			cursor: pointer;
		}
		tr:hover{
	    	background-color: #403344;
	    }
	    td{
	    	color: #fff;
	    }
	</style>
</head>
<body class="container">
	<table class="table table-bordered">
		<tr>
			<td class="t1"><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;编号</td>
			<td class="t1"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;姓名</td>
			<td class="t1"><span class="glyphicon glyphicon-earphone">&nbsp;手机号</td>
			<td class="t1"><span class="glyphicon glyphicon-briefcase">&nbsp;职业</td>
			
		</tr>
		<tr>
			<td><a href="">1</a></td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
		</tr>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
</script>
</html>