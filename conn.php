<?php
$con = mysql_connect("localhost","root","lyu66559033");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("PHPLibrary", $con);

// 用UTF8编码查询
mysql_query("SET NAMES utf8");
?>