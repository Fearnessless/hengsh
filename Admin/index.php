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
<frameset rows="100,*" frameborder="0" border="1px">
	<frame src="top.php" name="top" scrolling="no">
		<frameset cols="150,*">
			<frame src="left.php" name="left" noresize scrolling="no"></frame>
			<frame src="right.php" name="right"></frame>
		</frameset>
	</frame>
</frameset>
</html>