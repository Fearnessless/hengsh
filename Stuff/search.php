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
		.div{
			margin-top: 10px;
			width: 500px;
			margin-bottom: 10px;
		}
		td{
			text-align: center;
			height: 32px;
		}
		a{
			color: #000;
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
			background: rgb(217, 237, 247);
		}
		.t1:hover{
			background: rgb(217, 237, 247);
		}
		table{
			display: none;
		}
		.search{
			cursor: pointer;
		}
	</style>
</head>
<body class="container">
	<div class="input-group div">
  		<input type="text" class="form-control text" placeholder="输入搜索关键词" aria-describedby="basic-addon2">
  		<span class="input-group-addon" id="basic-addon2">
  			<span class="glyphicon glyphicon-search search"></span>
  		</span>
 		
	</div>
	
	<table class="table table-bordered table-hover">
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
	$('.a').click(function(){
		$(this).parent().parent().hide(1000);
	});
	$('.search').click(function(){
		if ($('.text').val()=="") {
			alert("不能为空！");
		}else{
			window.location.href = "search.php?id="+$('.text').val();
		}
		
	});
</script>
</html>