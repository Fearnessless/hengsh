<?php

	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
require "../Mysql.php";

$db = new mysql();
$table = 'worker';

$sql = 'SELECT MAX(workid) FROM '.$table;
$id = $db->getOne($sql);
$id[0]++;
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
		body{
			background-image: linear-gradient(to bottom right, #5A495C,#CD9F64);
		}
		html,body{
	    	height: 100%;
	    	width: 100%;
	    }
		p{
			text-align: center;
			font-size: 18px;
			margin-top: 18px;
			color: #fff;
		}
		hr{
			margin: 0px;
			background-color: #BA9162;
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
		input,select{
			height: 32px;
			width: 100%;
			border-radius: 4px;
			font-size: 14px;
			border: 1px solid #ccc;
			background-color:#7A615E;
			padding-left: 5px;
			color: #fff;
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
		
		select{
			width: 200px;
		}
		.sub{
			width: 100px;
			height: 30px;
			color: #fff;
			background: #BE9363;
			border-radius: 3px;
			border: 1px solid #7A615E;
		}
	</style>
</head>
<body class="container">
	<p>填写信息</p>
	<hr>
	<form action="doAdd.php" method="post">
		<table>
			<tr>
				<td class="td1 name">姓名：</td>
				<td class="td2">
					<input type="text" name="workname">
				</td>
			</tr>
			<tr>
				<td class="td1">账号：</td>
				<td class="td2">
					<input type="text" value="<?php echo $id[0];?>" type="" name="workid" readonly="true">
				</td>
			</tr>
			<tr>
				<td class="td1 password">密码：</td>
				<td class="td2">
					<input type="text" name="password">
				</td>
			</tr>
			<tr>
				<td class="td1 tele">联系方式：</td>
				<td class="td2">
					<input type="text" name="tele">
				</td>
			</tr>
			<tr>
				<td class="td1">性别：</td>
				<td class="td2 sel">
					<select name="gender">
						<option>男</option>
						<option>女</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="td1">职位：</td>
				<td class="td2 sel">
					<select name="position">
						<option>管理员</option>
						<option>普通员工</option>
					</select>
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
<script type="text/javascript">
	$(".name").blur(function(){
		if ($(this).val()=="") {
			alert("名字不能为空！！！");
		}else{
			i++;
		}
	});
	$(".password").blur(function(){
		if ($(this).val()=="") {
			alert("密码不能为空！！！");
		}else{
			i++;
		}
	});
	$(".tele").blur(function(){
		if ($(this).val()=="") {
			alert("联系方式不能为空！！！");
		}else{
			i++;
		}
	});
	$(".sub").click(function(){
		i=0;
		if ($(".name").val()=="") {
			alert("名字不能为空！！！");
			
		}else{
			i++;
		}
		if ($(".password").val()=="") {
			alert("密码不能为空！！！");
			
		}else{
			i++;
		}
		if ($(".tele").val()=="") {
			alert("联系方式不能为空！！！");
			
		}else{
			i++;
		}
		if (i!=3) {
			return false;
		}
	});
</script>
</html>