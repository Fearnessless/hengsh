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
			display: inline-block;
			text-decoration: none;
			margin-left: 10px;
			font-size:15px;
			color: #fff;
			cursor:pointer;
			border-radius: 25px;
			padding: 2px;
		}
		.dat{
			cursor: pointer;
		}
		.a:hover{
			background: #fff;
			color: #664033;
			text-decoration: none;
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
	<table class="table">
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
				<a href="stuffedit.php?workid=<?php echo $k['workid'];?>" class="a">修改</a>
				<?php if($k['workid'] != '1000') { ?><a href="doDel.php?workid=<?php echo $k['workid']; ?>" class="del a">删除</a> <?php } ?>
				<?php if($k['position'] == 'stuff') { ?><a href="adminAct.php?workid=<?php echo $k['workid']; ?>&&act=1" class="a ">设置为管理员</a> <?php } ?>
				<?php if($k['position'] == 'admin') { ?><a href="adminAct.php?workid=<?php echo $k['workid']; ?>&&act=2" class="a ">取消管理员资格</a> <?php } ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
<script type="text/javascript">
	$("table").show(2000);
	$('.del').click(function(){
		if(confirm("你确定删除吗？")) { } else {  
      return false;
    }
	});
	
</script>
</html>