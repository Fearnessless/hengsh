<?php
    session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
    }

    require "../Mysql.php";

    $workid = $_SESSION['workid'];
    $dataid = $_GET['id'];
    $loadtime = date("Y-m-d");

    $db = new mysql();
    $table = "owndata";
    $sql = "INSERT INTO {$table} VALUES ('{$workid}','{$loadtime}','{$dataid}')";
    $stalker = "UPDATE pubdata SET stalker='{$workid}' WHERE id='{$dataid}'";
    
    $rs = $db->affected_rows($sql);
    if($rs) { 
        $k = $db->affected_rows($stalker);
        print_r($k);
        if($k) { ?>
            <script language="javascript">
                alert("数据领取成功！");
                window.history.back(-1);
            </script>
        <?php } else { ?>
            <script language="javascript">
                alert("数据领取失败！");
                window.history.back(-1);
            </script>
        <?php }
    } else { ?>
        <script language="javascript">
            alert("数据领取失败！");
            window.history.back(-1);
        </script>
    <?php }