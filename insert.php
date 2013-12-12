<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['mno']) && !isset($_SESSION['mid'])){
    header("Location:loginin.php");
    exit();
}

require_once( "init.php" );

$page = new QuickSkin( "default/insert.htm" );
$page->assign( 'title',  '图书入库' );

$page->set('template_dir', '_skins/');
$page->set('temp_dir', '_skins_tmp/');
$page->set('cache_dir', '_skins_tmp/');

// do substitute of template image directory
$page->assign('tpl_img', 'tplimgs/');

// do substitute of template javascript directory
$page->assign('tpl_js', 'tpljs/');
   
// $page->debug();
$page->output();
error_reporting(0);
?>