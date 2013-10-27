<?
require_once( "init.php" );
require ( "sphinxapi.php" );

$cl = new SphinxClient ();
$cl->SetServer ( '127.0.0.1', 9312);
$cl->SetConnectTimeout ( 3 );
$cl->SetArrayResult ( true );
$cl->SetMatchMode ( SPH_MATCH_ANY );

// $res = $cl->Query ( '老王', "mysql" );
$res = $cl->Query ( $_POST["name"], "mysql" );

// print_r($cl);
// print_r($res);
// print_r($res["matches"]);
foreach ($res["matches"] as $value){
	print($value["id"]);
}
?>