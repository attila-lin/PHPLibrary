<?
require_once( "init.php" );
require ( "sphinxapi.php" );

$cl = new SphinxClient ();
$cl->SetServer ( '127.0.0.1', 9312);
$cl->SetConnectTimeout ( 3 );
$cl->SetArrayResult ( true );
$cl->SetMatchMode ( SPH_MATCH_ANY );

$res = $cl->Query ( '老王', "mysql" );
// $res = $cl->Query ( $_POST["name"], "mysql" );

// print_r($cl);
// print_r($res);
// print_r($res["matches"]);



require_once( "conn.php" );

$array = array();
foreach ($res["matches"] as $value){
	// print($value["id"]);
	array_push($array, $value["id"]);
}

// $result = 'SELECT * 
//           FROM `book` 
//          WHERE `bno` IN (' . implode(',', array_map('intval', $array)) . ')';

//！！！！！！！！！！没有有序！！！！！！！！！！！！！！
$result = 'SELECT * 
          FROM `book` 
         WHERE `bno` IN (' . implode(",", $array) . ')';

$result = mysql_query($result);

while($row = mysql_fetch_array($result))
{
	echo $row['title'];
	echo "<br />";
}

?>