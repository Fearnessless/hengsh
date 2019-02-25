<?php
session_start();
//设置中国时区
date_default_timezone_set('PRC');

//设定编码字符集
header("Content-Type: text/html;charset=utf-8");

// 引入Mysql类
require "Mysql.php";

$name = $_POST['username'];
$pass = $_POST['password'];

$db = new mysql();

// print_r($db);

function login($db, $name, $pass) {
    $sql = "SELECT * FROM worker WHERE workid='".$name."' and password='".$pass."'";
    $stmt = $db->getOne($sql);
    // print_r($stmt);
    if($stmt != null) {
        $_SESSION['workid']=$stmt['workid'];
        $_SESSION['password']=$stmt['password'];
        if($stmt['position'] == 'boss') {
            header("location:./SuperAdmin/index.php");
        } else if($stmt['position'] == 'admin') {
            header("location:./Admin/index.php");
        } else if($stmt['position'] == 'stuff') {
            header("location:./Stuff/index.php");
        }
    } else { ?>
        <script language="javascript">
            alert("账号或密码错误！请确认后重新登录。");
            window.history.back(-1);
        </script>
    <?php
    }
}

login($db, $name, $pass);