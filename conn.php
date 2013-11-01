<?php
$con = mysql_connect("localhost","root","lyu66559033");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db("PHPLibrary", $con);

?>