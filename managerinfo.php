<?php

//********************************
//以下部分用来判断是否登陆
//********************************

session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//********************************
//显示manager信息
//********************************

//包含数据库连接文件
include('conn.php');

$mno = $_SESSION['mno'];
$mid = $_SESSION['mid'];
$manager_query = mysql_query("select * from user where mno=$mno limit 1");
$row = mysql_fetch_array($manager_query);

echo '用户信息：<br />';
echo '用户ID：',		$mid,			'<br />';
echo '用户名：', 		$mid,			'<br />';
echo '真实姓名：',	$row<'mname'>,	'<br />';
echo '电话号码：',	$row<'mphone'>,	'<br />';
echo '<a href="login.php?action=logout">注销</a> 登录<br />';

?>