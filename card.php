<?php
require_once( "init.php" );

$page = new QuickSkin( "default/card.htm" );
$page->assign( 'title',  'TemplateDemo' );

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