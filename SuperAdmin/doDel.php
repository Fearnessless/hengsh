<?php 

    session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
    require "../Mysql.php";
    
    $table = 'worker';
    $workid = $_GET['workid'];
    $sql = 'delete from '.$table.' WHERE workid='.$workid;
    if($workid == '1000') { ?>
        <script language="javascript">
            alert("删除失败！");
            window.history.back(-1);
        </script>
    <?php } else {
        $db = new mysql();
        $rs = $db->affected_rows($sql);
        if($rs) { ?>
            <script language="javascript">
                alert("删除成功！");
                window.location.href="right.php";
            </script>
        <?php } else { ?>
            <script language="javascript">
                alert("删除失败！");
                window.history.back(-1);
            </script>
        <?php }
    }