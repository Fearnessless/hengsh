<?php
session_start();
if (!isset($_SESSION['workid'])) {
    echo "<script>location='../index.html'</script>";
    exit;
}
require "../Mysql.php";
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
$table = 'worker';
$db = new mysql();
$where = 'workid='.$array['workid'];
$rs = $db->autoExecute($table, $array, 'update', $where);
// var_dump($rs);
if($rs) {
    ?><script language="javascript">
        alert("修改成功");
        window.location.href="right.php";
    </script>
<?php } else {
    ?><script language="javascript">
        alert("修改失败");
        window.history.back(-1);
    </script>
<?php }