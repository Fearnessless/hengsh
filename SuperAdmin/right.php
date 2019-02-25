<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
	require "../Mysql.php";

	$db = new mysql();

	$table = 'worker';
	$sql = 'SELECT * FROM '.$table;
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
		a{

			height: 22px;
			display: inline-block;
			text-decoration: none;
			margin-left: 10px;
			font-size:18px;
			color: #337ab7;
			cursor:pointer;
			border-radius: 25px;
			padding-left: 5px;
			padding-right: 5px;

		}
		a:hover{
			color: #fff;
			text-decoration: none;
			background:#337ab7;
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
			<td><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;姓名</td>
			<td><span class="glyphicon glyphicon-asterisk">&nbsp;性别</td>
			<td><span class="glyphicon glyphicon-earphone">&nbsp;联系方式</td>
			<td><span class="glyphicon glyphicon-triangle-right">&nbsp;操作</td>
			
		</tr>
		<?php foreach($rs as $k) { ?>
		<tr>
			<td><?php echo $k['workid'];?></td>
			<td><?php echo $k['workname'];?></td>
			<td><?php echo $k['gender'];?></td>
			<td><?php echo $k['tele'];?></td>
			<td>
				<a href="stuffedit.php?workid=<?php echo $k['workid'];?>">修改</a>
				<?php if($k['workid'] != '1000') { ?><a href="doDel.php?workid=<?php echo $k['workid']; ?>" class="del">删除</a> <?php } ?>
				<?php if($k['position'] == 'stuff') { ?><a href="adminAct.php?workid=<?php echo $k['workid']; ?>&&act=1" >设置为管理员</a> <?php } ?>
				<?php if($k['position'] == 'admin') { ?><a href="adminAct.php?workid=<?php echo $k['workid']; ?>&&act=2" >取消管理员资格</a> <?php } ?>
			</td>
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
		if(confirm("你确定删除吗？")) { } else {  
      return false;
    }
	});
	
</script>
</html>