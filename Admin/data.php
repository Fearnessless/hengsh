<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	
	require "../Mysql.php";

	$db = new mysql();
	$table = 'pubdata';
	// $stalker = '';
	$sql = "SELECT * FROM ".$table." WHERE stalker='1000'";
	$rs = $db->getAll($sql);
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
		.dat{
			cursor: pointer;
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
			<td><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;公司</td>
			<td><span class="glyphicon glyphicon-user">&nbsp;联系人</td>
			<td><span class="glyphicon glyphicon-earphone">&nbsp;联系方式</td>
			<!-- <td><span class="glyphicon glyphicon-ok-sign">&nbsp;跟踪人</td> -->
			<td><span class="glyphicon glyphicon-time">&nbsp;数据入库时间</td>
			<td><span class="glyphicon glyphicon-pencil">&nbsp;标记</td>
				
		</tr>
		<?php foreach($rs as $k) { ?>
		<tr>
			<td><?php echo $k['id']; ?></td>
			<td><?php echo $k['company']; ?></td>
			<td><?php echo $k['contact']; ?></td>
			<td><?php echo $k['tele']; ?></td>
			<td><?php echo $k['intime']; ?></td>
			<!-- <td>1</td> -->
			<td><?php echo $k['signed']; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
</script>
</html>