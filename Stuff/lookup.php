<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	
	require "../Mysql.php";
	
	$db = new mysql();
	$table = 'owndata';
	$sql = "SELECT * FROM owndata WHERE workid=";
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
			width: 30px;
			height: 25px;
			display: inline-block;
			text-decoration: none;
			margin-left: 10px;
			font-size:18px;
			color: #fff;
			cursor:pointer;
			border-radius: 25px;
		}
		.dat{
			cursor: pointer;
		}
		.int{
			cursor: pointer;
		}
		.a:hover{
			background: #664033;
			
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
		.form-control{
			background-color:#403344;

		}
		input::-webkit-input-placeholder {
	        color: #fff;
	        font-size: 16px;
	    }
	    .s{
	    	background-color:#403344; 
	    }
	    .search{
	    	color: #fff;
	    }
	    tr:hover{
	    	background-color: #403344;
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
			<td class="t1"><span class="glyphicon glyphicon-heart-empty">&nbsp;满意度</td>
		</tr>
		<tr>
			<td class="dat">1</td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>
				2
			</td>
		</tr>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
	$('.dat').click(function(){
		window.location.href = "datainfo.php?id="+$('.dat').html();
	});
</script>
</html>