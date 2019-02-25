<?php

	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	
	require "../Mysql.php";

	$db = new mysql();
	$table = "pubdata";
	$sql = "SELECT * FROM ".$table." WHERE stalker='1000'";
	$rs = $db->getAll($sql);
	// print_r($rs);
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

		.div{
			margin-top: 10px;
			width: 500px;
			margin-bottom: 10px;


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
			color: #337ab7;
			cursor:pointer;
			border-radius: 25px;
		}
		.a:hover{
			background: #337ab7;
			color: #fff;
		}
		.t1{
			color: #333;
			font-size: 16px;
		}
		table{
			display: none;
		}
	</style>
</head>
<body class="container">
	<div class="input-group div">
  		<input type="text" class="form-control" placeholder="输入搜索关键词" aria-describedby="basic-addon2">
  		<span class="input-group-addon" id="basic-addon2">
  			<a href=""><span class="glyphicon glyphicon-search"></span></a>
  		</span>
 		
	</div>
	
	<table class="table table-bordered table-hover">
		<tr class="t1">
			<td><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;编号</td>
			<td><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;法人</td>
			<td><span class="glyphicon glyphicon-earphone">&nbsp;手机号</td>
			<td><span class="glyphicon glyphicon-briefcase">&nbsp;公司</td>
			<td><span class="glyphicon glyphicon-heart-empty">&nbsp;标记</td>
		</tr>
		<?php foreach($rs as $k) { ?>
		<tr>
			<td><?php echo $k['id']; ?></td>
			<td><?php echo $k['legalrep']; ?></td>
			<td><?php echo $k['tele']; ?></td>
			<td><?php echo $k['company']; ?></td>
			<td><?php echo $k['signed']; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
	$('.a').click(function(){
		$(this).parent().parent().hide(1000);
	});

	
</script>
</html>