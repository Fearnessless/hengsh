<?php
    session_start();
	  if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
    }
    
    require "../Mysql.php";
    print_r($_GET);

    $workid = $_SESSION['workid'];
    $intention = $_GET['intention'];
    $id = $_GET['id'];
    $db = new mysql();
    $sql = "UPDATE pubdata SET intention='{$intention}' WHERE id='{$id}'";
    $rs = $db->affected_rows($sql);
    if($rs) { ?>
        <script language="javascript">
            // alert("数据领取成功！");
            window.history.back(-1);
        </script>
    <?php } else { ?>
        <script language="javascript">
          alert("标记失败！");
          // window.history.back(-1);
        </script>
    <?php }