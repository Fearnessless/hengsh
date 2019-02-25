<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	require "../Mysql.php";
	// print_r($_GET);
	$workid = $_GET['workid'];
	$db = new mysql();
	$table = 'worker';
	$sql = 'SELECT * FROM '.$table.' WHERE workid='.$workid;
	$rs = $db->getOne($sql);
	// print_r($rs);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sadd</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bs/css/bootstrap.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
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
			height: 400px;
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
		input{
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
		select{
			width: 200px;
		}
	</style>
</head>
<body class="container">
	<p>修改员工信息</p>
	<hr>
	<form action="doEdit.php" method="post">
		<table>
			<tr>
				<td class="td1">姓名：</td>
				<td class="td2">
					<input type="text" name="workname" value="<?php echo $rs['workname'];?>">
				</td>
			</tr>
			<tr>
				<td class="td1">账号：</td>
				<td class="td2">
					<input type="text" value="<?php echo $rs['workid'];?>" type="" name="workid" readonly="true">
				</td>
			</tr>
			<tr>
				<td class="td1">密码：</td>
				<td class="td2">
					<input type="text" name="password" value="<?php echo $rs['password'];?>">
				</td>
			</tr>
			<tr>
				<td class="td1">联系方式：</td>
				<td class="td2">
					<input type="text" name="tele" value="<?php echo $rs['tele'];?>">
				</td>
			</tr>
			<tr>
				<td class="td1">性别：</td>
				<td class="td2 sel">
					<select name="gender">
						<option <?php if($rs['gender'] == '男') {?> selected <?php } ?>>男</option>
						<option <?php if($rs['gender'] == '女') { ?> selected <?php } ?>>女</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="td1">职位级别：</td>
				<td class="td2 sel">
					<select name="position">
						<?php if($rs['workid'] == '1000') { ?>
						<option <?php if($rs['position'] != 'boss') { ?> selected <?php } ?>>大老板</option>
						<?php } else { ?>
						<option <?php if($rs['position'] == 'admin') { ?> selected <?php } ?>>管理员</option>
						<option <?php if($rs['position'] == 'stuff') { ?> selected <?php } ?>>普通职工</option>
						<?php } ?>
					</select>
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