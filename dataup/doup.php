<?php
    session_start();
	if (!isset($_SESSION['workid'])) {
		echo "<script>location='../index.html'</script>";
		exit;
    }
    
    require "../Mysql.php";

    // 设置上海时区
    date_default_timezone_set("Asia/Shanghai");

    $db = new mysql();
    // print_r($_FILES);
    $table = "upfile";
    $sql = "SELECT MAX(fileid) FROM ".$table;
    $rs = $db->getOne($sql);
    if($rs['MAX(fileid)']) {
        $file_id = $rs['MAX(fileid)'] + 1;
    } else {
        $file_id = 1;
    }

    // 初始化file表信息
    $workid = $_SESSION['workid'];
    $file_name = $_FILES['upfile']['name'];
    $file_type = $_FILES['upfile']['type'];
    $file_tmp = $_FILES['upfile']['tmp_name'];
    $file_error = $_FILES['upfile']['error'];
    $file_size = $_FILES['upfile']['size'];
    $file_tail = substr($file_name, strpos($file_name,'.')+1);
    // echo $file_id;

    // 初始化文件上传路径
    $uppath = str_replace('\\','/',dirname(__FILE__)).'/upfile/'.$workid;
    // echo $uppath;

    // 对文件进行过滤
    if($_FILES['upfile']['error'] > 0) { ?>
        <script language="javascript">
            alert("文件上传失败，请重新上传");
            window.history.back(-1);
        </script>
    <?php } else if(substr($file_name, -4) != 'xlsx' && substr($file_name, -3) != 'xls') { ?>
        <script language="javascript">
            alert("文件类型错误，请重新上传");
            window.history.back(-1);
        </script>
    <?php } else {
        $dir = iconv("UTF-8", "GBK", $uppath);
        if(!file_exists($dir)) {
            mkdir($dir);
        } else {
            $filesave = $uppath."/".$file_id."_".$workid."_".date("Y-m-d").".".$file_tail;
            move_uploaded_file($file_tmp, $filesave);
            $sql = "INSERT INTO ".$table." VALUES('{$file_id}','{$workid}','{$file_name}','{$filesave}','{$file_size}',
                    '".date("Y-m-d h:i:sa")."')";
            $rs = $db->affected_rows($sql);
            if($rs) { ?>
                <script language="javascript">
                    alert("数据导入成功，正在导入");
                    window.location.href="filein.php?file=<?php echo $filesave ?>";
                </script>
            <?php } else { ?>
                <script language="javascript">
                    alert("数据导入失败，请重新上传");
                    window.history.back(-1);
                </script>
            <?php }
        }
    }