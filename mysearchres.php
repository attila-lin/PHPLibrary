<?php
require_once( "init.php" );

$page = new QuickSkin( "default/mysearchres.htm" );
$page->assign( 'title',  '搜索结果' );

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

print_r($_GET);


?>