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
		body{
			background-image: linear-gradient(to bottom right, #5A495C,#CD9F64);
		}
		html,body{
	    	height: 100%
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
	    tr:hover{
	    	background-color:#403344; 
	    }
	</style>
</head>
<body class="container">	
	<table class="table table-bordered">
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
				<div class="a intA">A</div>
				<div class="a intB">B</div>
				<div class="a intC">C</div>
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
	$('.intA').click(function(){
		var a=$(this).index;
		alert(a);
		window.location.href = "doSign.php?id="+$(".dat:eq(3)").html()+"&intention=A";
	});
	$('.intB').click(function(){
		var a=$(this).index;
		alert(a);
		window.location.href = "doSign.php?id="+$(".dat:eq(3)").html()+"&intention=B";
	});
	$('.intC').click(function(){
		var a=$(this).index;
		window.location.href = "doSign.php?id="+$(".dat:eq(3)").html()+"&intention=C";
	});

	
</script>
</html>