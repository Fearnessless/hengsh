<?php

session_start();
    if (!isset($_SESSION['workid'])) {
        echo "<script>location='../index.html'</script>";
        exit;
    }

require "../Mysql.php";

$db = new mysql();

$array = array();
$array['workid'] = $_POST['workid'];
$array['workname'] = $_POST['workname'];
$array['password'] = $_POST['password'];
$array['gender'] = $_POST['gender'];
$array['tele'] = $_POST['tele'];
if($_POST['position'] == '管理员') {
    $array['position'] = 'admin';
} else {
    $array['position'] = 'stuff';
}
$array['pid'] = $_SESSION['workid'];

$table = 'worker';

$rs = $db->autoExecute($table, $array, $act='insert');
// print_r($rs);
if($rs) { ?>
    <script language="javascript">
            alert("员工添加成功！");
            window.location.href="index.php";
    </script>
<?php } else { ?>
    <script language="javascript">
            alert("员工添加失败！");
            window.history.back(-1);
    </script>
<?php }