<?php
    session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
	}
    require_once "fileread.class.php";
    // require "../Mysql.php";

    $db = new mysql();
    $table = "pubdata";
    $dataid = "SELECT max(id) FROM ".$table;
    $id = $db->getOne($dataid);
    $id = $id['max(id)'] + 1;

    // 判断职位
    $position = "SELECT position FROM worker WHERE workid={$_SESSION['workid']}";
    if($position == 'boss') {
        $page = "../SuperAdmin/index.php";
    } else if($position == 'admin') {
        $page = "../Admin/index.php";
    } else if($position = 'stuff') {
        $page = "../Stuff/index.php";
    }

    $file = $_GET['file'];

    $read = new dataset();
    $set = $read->read($file); // 读取数据
    unset($set[0]);

    $sucsess = 0;
    foreach($set as $v) {
        $sql = "";
        $sql .= "INSERT INTO pubdata (id,company,legalrep,regiscap,builddate,managestate,province,city,county,comtype,uscc,
            tele,moretele,addr,website,email,business,intime) VALUES ('{$id}',{$v}'".date("Y-m-d")."');";
        $rs = $db->affected_rows($sql);
        echo $rs."<br>";
        $id++;
    } ?>
        <script language="javascript">
            alert("已成功导入数据<?php echo $id; ?>条");
            window.location.href="<?php echo $page; ?>";
        </script>
     <?php //} else { ?>
         <!-- <script language="javascript">
    //         alert("数据导入失败");
    //         window.history.back(-3);
    //     </script> -->
     <?php //}
