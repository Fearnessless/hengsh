<?php
	session_start();
	if (!$_SESSION['workid']) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
?>
<?php
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
		.dat{
			cursor: pointer;
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
			<td class="t1"><span class="glyphicon glyphicon-earphone"></span>&nbsp;手机号</td>
			<td class="t1"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;公司</td>
			<td class="t1"><span class="glyphicon glyphicon-heart"></span>&nbsp;标记</td>
			<td class="t1"><span class="glyphicon glyphicon-ok"></span>&nbsp;领取任务</td>
		</tr>
		<?php foreach($rs as $k) { ?>
		<tr>
			<td class="dat"><?php echo $k['id']; ?></td>
			<td><?php echo $k['contact']; ?></td>
			<td><?php echo $k['tele']; ?></td>
			<td><?php echo $k['company']; ?></td>
			<td><?php echo $k['signed']; ?></td>
			<td><a href=""><span class="glyphicon glyphicon-ok"></span></a></td>
		</tr>
		<?php } ?>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
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
</script>
</html>