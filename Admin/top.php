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
		h1{
			color:#337ab7;
		}
		.button{
			margin-top:40px;
			float: right;

		}
		a{
			color: #fff;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-8">
				<h1 class="head-page">管理员登陆</h1>
			</div>
			<div class="col-xs-4">
				<div class="button">
					<button type="button" class="btn btn-primary"><a href="../logout.php"  target="_parent">注销</a></button>
				</div>
			</div>
		</div>
		
	</div>
	
</body>
</html>