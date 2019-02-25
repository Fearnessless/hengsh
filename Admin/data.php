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
		.div{
			margin-top: 10px;
			width: 500px;
			margin-bottom: 10px;
		}
		td{
			text-align: center;
			height: 32px;
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
	$('.a').click(function(){
		$(this).parent().parent().hide(1000);
	});
	$('.del').click(function(){
		if(confirm("你确定删除吗？")) {  
            alert("已删除");  
        }  
        else {  
          return false;
        }  
	});
	
</script>
</html>