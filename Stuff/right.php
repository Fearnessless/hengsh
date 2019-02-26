<?php

	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	
	require "../Mysql.php";
	
	$workid = $_SESSION['workid'];
	$db = new mysql();
	$table = "pubdata";
	$sql = "SELECT * FROM {$table} WHERE stalker='{$workid}'";
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
		.dat{
			cursor: pointer;
		}
		.int{
			cursor: pointer;
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
			<td><span class="glyphicon glyphicon-heart-empty">&nbsp;满意度</td>
		</tr>
		<?php foreach($rs as $k) { ?>
		<tr>
			<td class="dat"><?php echo $k['id']; ?></td>
			<td><?php echo $k['legalrep']; ?></td>
			<td><?php echo $k['tele']; ?></td>
			<td><?php echo $k['company']; ?></td>
			
			<td>
			<?php if($k['intention']) { echo $k['intention']; } else {?>
				<div class="a int">A</div>
				<div class="a int">B</div>
				<div class="a int">C</div>
			</td>
		</tr>
		<?php }} ?>
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
	$('.dat').click(function(){
		window.location.href = "datainfo.php?id="+$('.dat').html();
	});
	$('.int').click(function(){
		window.location.href = "doSign.php?id=<?php echo $k['id']; ?>&intention="+$('.int').html();
	});
</script>
</html>