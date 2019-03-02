<?php
	session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>top</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bs/css/bootstrap.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
	<style type="text/css">
		a{
			color: #fff;
			display: inline-block;
			width: 45px;
			height: 28px;
			background-color: #7C635F;
			border: 1px solid #fff;
			border-radius: 3px;
			text-align: center;
			float: right;
			margin-top: 30px;
			padding-top: 2px;
		}
		a:hover{
			color:#BE9363;
			text-decoration: none;

		}
		.head-page{
			color: #fff;
			
		}
		body{
			background-image: linear-gradient(to bottom right, #5A495C,#CD9F64);
		}
		html,body{
	    	height: 100%;
	    	width: 100%;
	    }	
		.d1{
			float: left;
			margin-left: 8%;
		}
	
		.d2{
			float: right;
			margin-right:8%;
		}
		.d3{
			float: right;
			margin-right: 2%;
		}
		.div{
			margin-top: 25px;
			width: 300px;
			margin-bottom: 10px;
			margin-left: 100px;
		}
		.s{
	    	background-color:#7A615E; 
	    	cursor: pointer;
	    }
	    .search{
	    	color: #fff;
	    }
		.form-control{
			background-color:#7A615E;
			color: #fff;

		}
		
	</style>
</head>
<body>
	<div class="d1">
		<h1 class="head-page">恒上信息科技有限公司</h1>
	</div>
	<div class="d2">
		<div class="button">
			<a href="../logout.php"  target="_parent">注销</a>
		</div>
	</div>
	<div class="d3">
		<div class="input-group div">
			  	<input type="text" class="form-control text" placeholder="  Search..." aria-describedby="basic-addon2">
			  	<span class="input-group-addon s" id="basic-addon2">
			  	<span class="glyphicon glyphicon-search search"></span>
			  	</span>
		 	</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('.search').click(function(){
		if ($('.text').val()=="") {
			alert("不能为空！");
		}else{
			parent.right.location.href = "search.php?id="+$('.text').val();
			$(".text").val('');
		}
		
	});
</script>
</html>