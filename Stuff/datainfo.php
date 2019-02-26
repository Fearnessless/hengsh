<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	
	require "../Mysql.php";
	
	$id = $_GET['id'];
	$db = new mysql();
	$table = 'pubdata';
	$sql = "SELECT * FROM {$table} WHERE id=".$id;
	$rs = $db->getOne($sql);
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
		td{
			text-align: center;
			height: 32px;
		}
		.t1{
			color: #333;
			font-size: 16px;
			background: rgb(217, 237, 247);
			width: 40%;
			text-align: right;
		}
		.t1:hover{
			background: rgb(217, 237, 247);
		}
		table{
			margin: 20px;
			display: none;
		}
	</style>
</head>
<body class="container">	
	<table class="table table-bordered table-hover t">
		<tr>
			<td class="t1">商机号：</td>
			<td ><?php echo $rs['id']; ?></td>	
		</tr>
		<tr>
			<td class="t1">公司：</td>
			<td ><?php echo $rs['company']; ?></td>
		</tr>
		<tr>
			<td class="t1">法人：</td>
			<td><?php echo $rs['legalrep']; ?></td>
		</tr>
		<tr>
			<td class="t1">企业公示的联系电话：</td>
			<td ><?php echo $rs['tele']; ?></td>
		</tr>
		<tr>
			<td class="t1">跟踪人：</td>
			<td ><?php echo $rs['stalker']; ?></td>
		</tr>
		<tr>
			<td class="t1">意向度：</td>
			<td ><?php echo $rs['intention']; ?></td>
		</tr>
		<tr>
			<td class="t1">标记：</td>
			<td ><?php echo $rs['signed']; ?></td>
		</tr>
		<tr>
			<td class="t1">录入时间：</td>
			<td ><?php echo $rs['intime']; ?></td>
		</tr>
		<tr>
			<td class="t1">注册资本：</td>
			<td ><?php echo $rs['regiscap']; ?></td>
		</tr>
		<tr>
			<td class="t1">成立日期：</td>
			<td ><?php echo $rs['builddate']; ?></td>
		</tr>
		<tr>
			<td class="t1">经营状态：</td>
			<td ><?php echo $rs['managestate']; ?></td>
		</tr>
		<tr>
			<td class="t1">省份：</td>
			<td ><?php echo $rs['province']; ?></td>
		</tr>
		<tr>
			<td class="t1">市区：</td>
			<td ><?php echo $rs['city']; ?></td>
		</tr>
		<tr>
			<td class="t1">区县：</td>
			<td ><?php echo $rs['county']; ?></td>
		</tr>
		<tr>
			<td class="t1">公司类型：</td>
			<td ><?php echo $rs['comtype']; ?></td>
		</tr>
		<tr>
			<td class="t1">统一社会信用码：</td>
			<td ><?php echo $rs['uscc']; ?></td>
		</tr>
		<tr>
			<td class="t1">更多联系方式：</td>
			<td ><?php echo $rs['moretele']; ?></td>
		</tr>
		<tr>
			<td class="t1">地址：</td>
			<td ><?php echo $rs['addr']; ?></td>
		</tr>
		<tr>
			<td class="t1">网址：</td>
			<td ><?php echo $rs['website']; ?></td>
		</tr>
		<tr>
			<td class="t1">企业邮箱：</td>
			<td ><?php echo $rs['email']; ?></td>
		</tr>
		<tr>
			<td class="t1">经营范围：</td>
			<td ><?php echo $rs['business']; ?></td>
		</tr>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
</script>
</html>