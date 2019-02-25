<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bs/css/bootstrap.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.js"></script>
	<title>index</title>
	<script src="jquery.js"></script>
	<style type="text/css">
	.login{ 
	        border:1px solid #ccc;  
	        height:320px;  
	        width:350px;  
	        position:fixed; 
	        top:20%;
	        left:38%;  
	        z-index:2;
	        border-radius: 3px;
	}
	.over{  
	        width: 100%;  
	        height: 100%;  
	        opacity:0.8;/*设置背景色透明度,1为完全不透明,*/   
	        position:fixed;  
	        top:0;  
	        left:0;  
	        z-index:1;  
	        background:url("1.gif");
	        background-size: 100%;  
    } 
    .Lo p{
			float: right;
			cursor: pointer;
			font-size:20px;
			margin-right: 15px;
	}

    .Lo table td{
			
			height: 60px;
			width: 450px;
			text-align: center;
			font-size: 10px;
			border-radius: 3px;
	}
	.Lo table th{
		height: 80px;
		width: 450px;
		text-align: center;
	}
	.Lo{
		margin-left: 5px;
		
	}
	.Lo input{
		height: 40px;
		width: 250px;
		border-radius: 4px;
		font-size: 18px;
	}
	img{
		height:320;
		width: 350%;
		border-radius: 5px;
	}
	</style>
</head>
<body>
	<div class="login"> 	
      	<div class="Lo">
	      	<form action="doLogin.php" method="post">
		      	<table>
		      		<th class="th">账 号 登 录</th>
		      		<tr>
		      			<td><input type="text" name="username" placeholder="请输入用户名" class="username"></td>
		      		</tr>
		      		<tr>
		      			<td><input type="password" name="password" placeholder="请输入密码" class="password"></td>
		      		</tr>
		      		<tr>
		      			<td><input type="submit" class="btn btn-info" value="登录" id="login"></td>
		      		</tr>
		      	</table>
	      	</form>
    	</div>
  
  	</div>  
  	<div class="over">    
</body>

<script type="text/javascript">
	
	$('.username').blur(function(){	
		username=$('.username').val();
		if (username=="") {
			$('.th').html('用户名不能为空');
			$('.th').css({'color':'#f00'});
		}else{
			$('.th').html('账 号 登 录');
			$('.th').css({'color':'#333'});
		}
		
	});
	$('.password').blur(function(){
		password=$('.password').val();
		if (password=="") {
			$('.th').html('密码不能为空');
			$('.th').css({'color':'#f00'});
		}else{
			$('.th').html('账 号 登 录');
			$('.th').css({'color':'#333'});
		}
		
	});
	$('#login').click(function(event){
		username=$('.username').val();
		password=$('.password').val();
		if (username=="") {	
			return false;
		}
		if (password=="") {
			return false;
		}
	});
</script>
</html>