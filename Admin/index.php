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
	<title>main</title>

</head>
<frameset rows="100,*" frameborder="1" border="1px">
	<frame src="top.php" name="top">
		<frameset cols="150,*">
			<frame src="left.php" name="left" noresize></frame>
			<frame src="right.php" name="right"></frame>
		</frameset>
	</frame>
</frameset>
</html>