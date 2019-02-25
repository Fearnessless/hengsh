<?php

    session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}

    require "../Mysql.php";

    $db = new mysql();
    $table = 'worker';

    // print_r($_GET);
    $workid = $_GET['workid'];
    $act = $_GET['act'];
    if($act == '1') {
        $sql = "UPDATE ".$table." SET position='admin' WHERE workid=".$workid;
        $rs = $db->affected_rows($sql); 
        if($rs){ ?>
            <script language="javascript">
                alert("设置管理员成功！");
                window.location.href="right.php";
            </script>
        <?php } else { ?>
            <script language="javascript">
                alert("设置管理员失败！");
                window.location.href="right.php";
            </script>
        <?php }
    } else {
        $sql = "UPDATE ".$table." SET position='stuff' WHERE workid=".$workid;
        $rs = $db->affected_rows($sql);
        if($rs){ ?>
            <script language="javascript">
                alert("取消管理员成功！");
                window.location.href="right.php";
            </script>
        <?php } else { ?>
            <script language="javascript">
                alert("取消管理员失败！");
                window.location.href="right.php";
            </script>
    <?php }
    }