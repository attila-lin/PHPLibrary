<?

// print_r($_POST);
// print_r($_POST['action']);

//********************************
//以下部分用来 增加card
//********************************
if($_POST['action'] == "增加"){
	// print_r($_POST);
	include( 'conn.php' );
	$query = mysql_query("INSERT INTO card (`cname`,`company`,`category`) VALUES ('$_POST[cname]', '$_POST[company]', '$_POST[category]')");
	echo mysql_errno() . ": " . mysql_error() . "\n";
	echo '增加成功！点击此处 <a href="card.php">继续</a>';
}


//********************************
//以下部分用来 删除card
//********************************

if($_POST['action'] == "删除"){
	// print_r($_POST);
	include( 'conn.php' );
	$query = mysql_query("DELETE FROM card WHERE `cno`='$_POST[cno]'");
	// mysql_fetch_array($query);
	echo mysql_errno() . ": " . mysql_error() . "\n";
    echo '删除成功！点击此处 <a href="card.php">继续</a>';
    exit;
}

?>
