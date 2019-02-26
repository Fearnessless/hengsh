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
			<td ></td>	
		</tr>
		<tr>
			<td class="t1">公司：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">联系人：</td>
			<td></td>
		</tr>
		<tr>
			<td class="t1">企业公示的联系电话：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">跟踪人：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">意向度：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">标记：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">录入时间：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">法定代表人：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">注册资本：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">成立日期：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">经营状态：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">省份：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">市区：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">区县：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">公司类型：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">统一社会信用码：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">更多联系方式：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">地址：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">网址：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">企业邮箱：</td>
			<td ></td>
		</tr>
		<tr>
			<td class="t1">经营范围：</td>
			<td ></td>
		</tr>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
</script>
</html>